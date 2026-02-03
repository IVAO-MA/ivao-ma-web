<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Chart;
use App\Models\Airport;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Adjust path if necessary. We previously copied it to resources/js/eaip/data/onda-charts.json
        $jsonPath = resource_path('js/eaip/data/onda-charts.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("File not found at: $jsonPath");
            return;
        }

        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        if (!$data) {
            $this->command->error("Failed to decode JSON");
            return;
        }

        foreach ($data as $icao => $charts) {
            $airport = Airport::where('icao', $icao)->first();

            if (!$airport) {
                // $this->command->warn("Airport $icao not found, skipping charts.");
                continue;
            }

            foreach ($charts as $chartData) {
                Chart::updateOrCreate(
                    [
                        'airport_id' => $airport->id,
                        'identifier' => $chartData['identifier'],
                    ],
                    [
                        'code' => $chartData['code'] ?? null,
                        'name' => $chartData['name'],
                        'type' => $chartData['type'],
                        'category' => $chartData['category'],
                        'url' => $chartData['url'],
                    ]
                );
            }
        }

        $this->command->info('Charts seeded successfully.');
    }
}
