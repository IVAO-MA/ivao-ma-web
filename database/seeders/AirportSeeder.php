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

                    Airport::updateOrCreate(
                        ['icao' => $data['icao_code']],
                        [
                            'name' => $getName($data['name']),
                            'city' => $getName($data['municipality']), // AirportDB uses 'municipality' for city
                            'country' => $data['iso_country'],
                            'iata' => $data['iata_code'],
                            'latitude' => $data['latitude_deg'],
                            'longitude' => $data['longitude_deg'],
                            'elevation_ft' => $data['elevation_ft'],
                            'type' => $data['type'], // small_airport, medium_airport, large_airport
                            'website_link' => $data['home_link'] ?? null,
                            'wikipedia_link' => $data['wikipedia_link'] ?? null,
                            'runways' => json_encode($data['runways'] ?? []),
                            'frequencies' => json_encode($data['freqs'] ?? []),
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
