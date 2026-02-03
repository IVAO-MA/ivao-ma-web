<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class IvaoFlightsService
{
    const API_URL = 'https://api.ivao.aero/v2/tracker/whazzup';
    const CACHE_TTL = 55; // seconds, just under the 60s refresh

    protected array $moroccanAirports = [
        'GMMN',
        'GMME',
        'GMMX',
        'GMFF',
        'GMAD',
        'GMMT',
        'GMMI',
        'GMML',
        'GMFM',
        'GMFO',
        'GMTA',
    ];

    /**
     * Fetch & cache the raw whazzup payload.
     */
    public function fetchRaw(): array
    {
        return Cache::remember('ivao_whazzup', self::CACHE_TTL, function () {
            $response = Http::timeout(15)
                ->withoutVerifying()
                ->withHeaders(['Accept' => 'application/json'])
                ->get(self::API_URL);

            $response->throw(); // throws on 4xx/5xx
            return $response->json();
        });
    }

    /**
     * Return only flights touching Morocco, split into departures / arrivals.
     */


    private function isMoroccan(string $code): bool
    {
        return in_array($code, $this->moroccanAirports)
            || (strlen($code) === 4 && str_starts_with($code, 'GM'));
    }

    private function mapFlight(array $p): array
    {
        return [
            'callsign' => $p['callsign'] ?? 'N/A',
            'userId' => $p['userId'] ?? null,
            'departure' => $p['flightPlan']['departureId'] ?? 'N/A',
            'arrival' => $p['flightPlan']['arrivalId'] ?? 'N/A',
            'aircraft' => $p['flightPlan']['aircraft']['model'] ?? $p['flightPlan']['aircraftId'] ?? '—',
            'altitude' => $p['lastTrack']['altitude'] ?? 0,
            'groundSpeed' => $p['lastTrack']['groundSpeed'] ?? 0,
            'state' => $p['lastTrack']['state'] ?? '—',
            'onGround' => $p['lastTrack']['onGround'] ?? false,
        ];
    }

    private function mapAtc(array $a): array
    {
        return [
            'callsign' => $a['callsign'] ?? 'N/A',
            'frequency' => $a['frequency'] ?? 'N/A',
            'userId' => $a['userId'] ?? null,
            'rating' => $a['rating'] ?? 0,
            'facility' => $a['atcSession']['facility']['id'] ?? 0, // 5=APP, 4=TWR, etc.
        ];
    }

    /**
     * Return flights and ATCs touching Morocco.
     */
    public function moroccanTraffic(): array
    {
        try {
            $data = $this->fetchRaw();
        } catch (\Exception $e) {
            return [
                'departures' => [],
                'arrivals' => [],
                'atcs' => [],
                'updatedAt' => now()->toIso8601String(),
                'error' => $e->getMessage(),
            ];
        }

        $pilots = $data['clients']['pilots'] ?? [];
        $atcs = $data['clients']['atcs'] ?? [];

        $departures = [];
        $arrivals = [];
        $activeAtcs = [];

        $uniqueDepartures = [];
        $uniqueArrivals = [];

        foreach ($pilots as $p) {
            $dep = strtoupper($p['flightPlan']['departureId'] ?? '');
            $arr = strtoupper($p['flightPlan']['arrivalId'] ?? '');
            $vid = $p['userId'] ?? null;

            if ($this->isMoroccan($dep)) {
                $mapped = $this->mapFlight($p);
                if ($vid) {
                    $uniqueDepartures[$vid] = $mapped;
                } else {
                    $departures[] = $mapped;
                }
            }

            if ($this->isMoroccan($arr)) {
                $mapped = $this->mapFlight($p);
                if ($vid) {
                    $uniqueArrivals[$vid] = $mapped;
                } else {
                    $arrivals[] = $mapped;
                }
            }
        }

        $departures = array_merge($departures, array_values($uniqueDepartures));
        $arrivals = array_merge($arrivals, array_values($uniqueArrivals));

        foreach ($atcs as $a) {
            $callsign = strtoupper($a['callsign'] ?? '');
            // Filter: Starts with GM or is GMMM (Casablanca FIR)
            // OBS stations usually have OBS in callsign, we can filter them out if needed, but let's keep it simple for now or filter by rating if desired.
            if (str_starts_with($callsign, 'GM')) {
                $activeAtcs[] = $this->mapAtc($a);
            }
        }

        return [
            'departures' => $departures,
            'arrivals' => $arrivals,
            'atcs' => $activeAtcs,
            'airports' => $this->calculateAirportStats($departures, $arrivals),
            'updatedAt' => $data['updatedAt'] ?? null,
        ];
    }

    private function calculateAirportStats(array $deps, array $arrs): array
    {
        $stats = [];
        // Helper to increment
        $inc = function ($icao) use (&$stats) {
            if (!$icao || $icao === 'N/A')
                return;
            if (!isset($stats[$icao])) {
                $stats[$icao] = ['icao' => $icao, 'total' => 0, 'dep' => 0, 'arr' => 0];
            }
            $stats[$icao]['total']++;
        };

        foreach ($deps as $d) {
            if (isset($stats[$d['departure']])) {
                $stats[$d['departure']]['total']++;
                $stats[$d['departure']]['dep']++;
            } else {
                $stats[$d['departure']] = ['icao' => $d['departure'], 'total' => 1, 'dep' => 1, 'arr' => 0];
            }
        }
        foreach ($arrs as $a) {
            if (isset($stats[$a['arrival']])) {
                $stats[$a['arrival']]['total']++;
                $stats[$a['arrival']]['arr']++;
            } else {
                $stats[$a['arrival']] = ['icao' => $a['arrival'], 'total' => 1, 'dep' => 0, 'arr' => 1];
            }
        }

        // Filter only defined Moroccan airports
        $moroccanStats = [];
        foreach ($this->moroccanAirports as $icao) {
            if (isset($stats[$icao])) {
                $moroccanStats[] = $stats[$icao];
            } else {
                // Should we include 0 traffic airports? Maybe just active ones for "Busiest"
                // Let's include them if we want a static list, but for "Busiest" let's filter relevant ones
                // Or better: pass all defined airports with 0s if we want to show a consistent top list
                $moroccanStats[] = ['icao' => $icao, 'total' => 0, 'dep' => 0, 'arr' => 0];
            }
        }

        // Sort by total desc
        usort($moroccanStats, fn($a, $b) => $b['total'] <=> $a['total']);

        // Take top 5
        return array_slice($moroccanStats, 0, 5);
    }

    public function fetchUpcomingEvents(): array
    {
        return Cache::remember('ivao_api_events', 600, function () { // 10 minutes cache
            try {
                $apiKey = config('services.ivao.api_key');
                if (!$apiKey)
                    return [];

                $response = Http::withHeaders([
                    'X-API-Key' => $apiKey,
                ])->get('https://api.ivao.aero/v1/events', [
                            'division' => 'MA',
                            'perPage' => 10, // Fetch a few
                        ]);

                if ($response->successful()) {
                    // Filter for future events just in case API returns past ones (though 'upcoming' is usually default or we check dates)
                    // The API structure usually returns an array of objects
                    $events = $response->json();
                    // If it's paginated, it might be in 'items' or 'data'. Let's assume standard array or check structure.
                    // Based on standard IVAO API v1, it returns array of events directly or paginated. 
                    // Let's assume array for now, or handle pagination wrapper if exists.
                    // IMPORTANT: Documentation says GET /events returns list.

                    // Filter valid ones
                    return collect($events)->filter(function ($event) {
                        return isset($event['startDate']) && \Carbon\Carbon::parse($event['startDate'])->isFuture();
                    })->sortBy('startDate')->values()->toArray();
                }

                return [];
            } catch (\Exception $e) {
                // Silent failure
                return [];
            }
        });
    }
}
