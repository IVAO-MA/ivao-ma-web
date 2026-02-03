<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Airport;
use Illuminate\Support\Facades\Log;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiToken = env('AIRPORT_DB_TOKEN');

        if (!$apiToken) {
            $this->command->error('AIRPORT_DB_TOKEN is not set in .env');
            return;
        }

        // List of Moroccan Airports to fetch (Source: airport-service.js)
        $icaos = [
            'GMMN',
            'GMMX',
            'GMFF',
            'GMTT',
            'GMAD',
            'GMME',
            'GMFO',
            'GMMZ',
            'GMMI',
            'GMMW',
            'GMTA',
            'GMFK',
            'GMAT',
            'GMTN',
            'GMMY',
            'GMMD',
            'GMFB',
            'GMFM',
            'GMMB',
            'GMAG',
            'GMFI',
            'GMSL',
            'GMAZ',
            'GMFA',
            'GMMO',
            'GMFZ',
            'GMAA',
            'GMMT',
            'GMML',
            'GMMH',
            'GMMA'
        ];

        // Default Scenery Data Map
        $sceneryData = [
            'GMMN' => [
                'link' => 'https://flightsim.to/file/14986/mohammed-v-intl-casablanca-gmmn',
                'sim' => 'MSFS',
                'type' => 'freeware'
            ],
            'GMMX' => [
                'link' => 'https://flightsim.to/file/10206/gmab-marrakech-menara-airport',
                'sim' => 'MSFS',
                'type' => 'freeware'
            ],
            'GMFF' => [
                'link' => 'https://flightsim.to/file/27986/gmff-fes-saiss-airport',
                'sim' => 'MSFS',
                'type' => 'freeware'
            ],
            'GMTT' => [
                'link' => 'https://flightsim.to/file/28412/gmtt-tangier-ibn-battouta-airport',
                'sim' => 'MSFS',
                'type' => 'freeware'
            ],
            'GMAD' => [
                'link' => 'https://flightsim.to/file/32415/gmad-al-massira-airport',
                'sim' => 'MSFS',
                'type' => 'freeware'
            ],
            'GMME' => [
                'link' => 'https://flightsim.to/file/29123/gmme-rabat-sale-airport',
                'sim' => 'MSFS',
                'type' => 'freeware'
            ]
        ];

        foreach ($icaos as $icao) {
            $this->command->info("Fetching data for $icao...");
            sleep(1); // Avoid rate limiting

            try {
                $response = Http::get("https://airportdb.io/api/v1/airport/{$icao}", [
                    'apiToken' => $apiToken
                ]);

                if ($response->successful()) {
                    $data = $response->json();


                    // Helper to extract string from array or return as-is
                    $getName = function ($value) {
                        if (is_array($value)) {
                            return $value['en'] ?? $value[0] ?? '';
                        }
                        return $value ?? '';
                    };

                    $name = $getName($data['name']);
                    $city = $getName($data['municipality']);

                    // Current scenery for this ICAO if exists
                    $scenery = $sceneryData[$icao] ?? null;

                    Airport::updateOrCreate(
                        ['icao' => $data['icao_code']],
                        [
                            'name' => ['en' => $name], // Save as array for JSON casting
                            'city' => ['en' => $city], // Save as array for JSON casting
                            'country' => $data['iso_country'],
                            'iata' => $data['iata_code'],
                            'latitude' => $data['latitude_deg'],
                            'longitude' => $data['longitude_deg'],
                            'elevation_ft' => $data['elevation_ft'],
                            'type' => $data['type'], // small_airport, medium_airport, large_airport
                            'website_link' => $data['home_link'] ?? null,
                            'wikipedia_link' => $data['wikipedia_link'] ?? null,
                            'runways' => $data['runways'] ?? [],
                            'frequencies' => $data['freqs'] ?? [],
                            'scenery_link' => $scenery['link'] ?? null,
                            'scenery_sim' => $scenery['sim'] ?? null,
                            'scenery_type' => $scenery['type'] ?? 'freeware',
                        ]
                    );

                    $this->command->info("Updated $icao");
                } else {
                    $this->command->error("Failed to fetch $icao: " . $response->status());
                    Log::error("AirportSeeder: Failed to fetch $icao", ['status' => $response->status(), 'body' => $response->body()]);
                }
            } catch (\Exception $e) {
                $this->command->error("Exception fetching $icao: " . $e->getMessage());
                Log::error("AirportSeeder: Exception for $icao", ['message' => $e->getMessage()]);
            }
        }
    }
}
