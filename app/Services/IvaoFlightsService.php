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
                ->withHeaders(['Accept' => 'application/json'])
                ->get(self::API_URL);

            $response->throw(); // throws on 4xx/5xx
            return $response->json();
        });
    }

    /**
     * Return only flights touching Morocco, split into departures / arrivals.
     */
    public function moroccanFlights(): array
    {
        try {
            $data = $this->fetchRaw();
        } catch (\Exception $e) {
            // Fallback empty structure in case of API failure
            return [
                'departures' => [],
                'arrivals' => [],
                'updatedAt' => now()->toIso8601String(),
                'error' => $e->getMessage(),
            ];
        }

        $pilots = $data['clients']['pilots'] ?? [];

        $departures = [];
        $arrivals = [];

        foreach ($pilots as $p) {
            $dep = strtoupper($p['flightPlan']['departureId'] ?? '');
            $arr = strtoupper($p['flightPlan']['arrivalId'] ?? '');

            if ($this->isMoroccan($dep))
                $departures[] = $this->mapFlight($p);
            if ($this->isMoroccan($arr))
                $arrivals[] = $this->mapFlight($p);
        }

        return [
            'departures' => $departures,
            'arrivals' => $arrivals,
            'updatedAt' => $data['updatedAt'] ?? null,
        ];
    }

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
}
