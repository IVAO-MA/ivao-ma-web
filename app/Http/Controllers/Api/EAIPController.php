<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class EAIPController extends Controller
{
    /**
     * Get all airports.
     */
    public function getAirports()
    {
        // Cache for 1 hour
        return Cache::remember('api.airports.all', 3600, function () {
            $data = Airport::orderBy('icao')->get()->map(function ($airport) {
                return [
                    'icao' => $airport->icao,
                    'iata' => $airport->iata,
                    'name' => $airport->name,
                    'city' => $airport->city,
                    'latitude' => $airport->latitude,
                    'longitude' => $airport->longitude,
                    'type' => $airport->type,
                    'elevation_ft' => $airport->elevation_ft,
                ];
            });

            return [
                'success' => true,
                'data' => $data
            ];
        });
    }

    /**
     * Get detailed airport info.
     */
    public function getAirport($icao)
    {
        $icao = strtoupper($icao);

        return Cache::remember("api.airport.{$icao}", 3600, function () use ($icao) {
            $airport = Airport::with('charts')->where('icao', $icao)->first();

            if (!$airport) {
                return response()->json(['error' => 'Airport not found'], 404);
            }

            // Transform frequencies to flat object for frontend
            $freqs = [];
            if (is_array($airport->frequencies)) {
                foreach ($airport->frequencies as $f) {
                    $type = strtolower($f['type'] ?? $f['description'] ?? '');
                    if (str_contains($type, 'twr') || str_contains($type, 'tower'))
                        $freqs['tower'] = $f['frequency_mhz'];
                    if (str_contains($type, 'gnd') || str_contains($type, 'ground'))
                        $freqs['ground'] = $f['frequency_mhz'];
                    if (str_contains($type, 'app') || str_contains($type, 'approach'))
                        $freqs['approach'] = $f['frequency_mhz'];
                    if (str_contains($type, 'atis'))
                        $freqs['atis'] = $f['frequency_mhz'];
                    if (str_contains($type, 'unicom'))
                        $freqs['unicom'] = $f['frequency_mhz'];
                }
                $freqs['all_frequencies'] = $airport->frequencies;
            }

            // Normalize runways (ensure lighting field exists and closed is boolean)
            $runways = $airport->runways ?? [];
            if (is_array($runways)) {
                foreach ($runways as &$rw) {
                    $rw['lighting'] = (bool) ($rw['lighting'] ?? $rw['lighted'] ?? false);
                    // AirportDB uses "1" for closed, "0" for open (strings in JSON)
                    // (bool)"0" is false in PHP, which is correct.
                    $rw['closed'] = (bool) ($rw['closed'] ?? false);
                }
            }

            // Standardize Scheduled Service (it might be "yes", "no", 1, 0, or true/false)
            $scheduledService = $airport->scheduled_service;
            if (is_string($scheduledService)) {
                $scheduledService = strtolower($scheduledService) === 'yes';
            } else {
                $scheduledService = (bool) $scheduledService;
            }

            // Transform data to match React frontend expectations
            return [
                'success' => true,
                'data' => [
                    'icao' => $airport->icao,
                    'iata' => $airport->iata,
                    'name' => $airport->name,
                    'city' => $airport->city,
                    'country' => $airport->country,
                    'latitude' => (float) $airport->latitude,
                    'longitude' => (float) $airport->longitude,
                    'elevation_ft' => $airport->elevation_ft ?? 0,
                    'type' => $airport->type,
                    'scheduled_service' => $scheduledService,
                    'runways' => $runways,
                    'frequencies' => $freqs,
                    'charts_link' => $airport->charts_link,
                    'wikipedia_link' => $airport->wikipedia_link,
                    'home_link' => $airport->website_link,
                    'charts' => $airport->charts,
                ]
            ];
        });
    }

    /**
     * Get METAR for an airport.
     */
    public function getMetar($icao)
    {
        $icao = strtoupper($icao);

        return Cache::remember("api.metar.{$icao}", 300, function () use ($icao) { // 5 min cache
            try {
                $response = Http::timeout(5)->get("https://aviationweather.gov/api/data/metar?ids={$icao}&format=json");

                if ($response->successful() && !empty($response->json())) {
                    return [
                        'success' => true,
                        'data' => $response->json()[0]
                    ];
                }

                return ['success' => false, 'error' => 'No METAR data found'];
            } catch (\Exception $e) {
                return ['success' => false, 'error' => $e->getMessage()];
            }
        });
    }

    /**
     * Get real-time flights for an airport from IVAO.
     */
    public function getFlights($icao, \App\Services\IvaoFlightsService $ivao)
    {
        $icao = strtoupper($icao);
        $traffic = $ivao->moroccanTraffic();

        // Filter flights where this airport is the origin (departures) or destination (arrivals)
        $departures = collect($traffic['departures'] ?? [])->filter(fn($f) => ($f['departure'] ?? '') === $icao);
        $arrivals = collect($traffic['arrivals'] ?? [])->filter(fn($f) => ($f['arrival'] ?? '') === $icao);

        // Map to the format expected by the React frontend (FlightTab.jsx)
        $data = $departures->map(function ($f, $index) use ($icao) {
            return [
                'id' => "dep-{$icao}-{$index}",
                'type' => 'departure',
                'callsignICAO' => $f['callsign'],
                'callsignIATA' => $f['callsign'], // Fallback
                'flightNumber' => $f['callsign'], // Fallback
                'status' => $f['onGround'] ? 'boarding' : 'departed',
                'origin' => ['icao' => $f['departure']],
                'destination' => ['icao' => $f['arrival']],
                'aircraft' => ['type' => $f['aircraft']],
                'departure' => ['scheduled' => now()->toIso8601String()],
                'arrival' => ['scheduled' => now()->addHours(2)->toIso8601String()],
                'airline' => ['codeIATA' => substr($f['callsign'], 0, 3), 'codeICAO' => substr($f['callsign'], 0, 3)],
                'distance' => 500,
            ];
        })->values()->toArray();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * Check if Casablanca Control (GMMM_CTR) is online on IVAO.
     */
    public function getFirStatus(\App\Services\IvaoFlightsService $ivao)
    {
        $traffic = $ivao->moroccanTraffic();
        $atcs = $traffic['atcs'] ?? [];

        $isOnline = collect($atcs)->contains(function ($atc) {
            return str_contains(strtoupper($atc['callsign'] ?? ''), 'GMMM_CTR');
        });

        return response()->json([
            'success' => true,
            'data' => [
                'online' => $isOnline,
                'callsign' => 'GMMM_CTR',
                'updated_at' => $traffic['updatedAt'] ?? now()->toIso8601String()
            ]
        ]);
    }
}
