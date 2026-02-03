<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VirtualAirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('virtual_airlines')->insert([
            [
                'name' => 'Atlas Skyways',
                'icao' => 'ASK',
                'logo_url' => '/images/va/atlas.png', // Placeholder
                'website_url' => 'https://atlasskyways.com',
                'description' => 'A premier virtual airline operating in Morocco.',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Royal Air Maroc Virtual',
                'icao' => 'RAM',
                'logo_url' => '/images/va/ram.png',
                'website_url' => 'https://ram-virtual.com',
                'description' => 'Flag carrier of Morocco.',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
