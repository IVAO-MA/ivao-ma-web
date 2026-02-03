<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('announcements')->insert([
            [
                'title' => 'Welcome to the New IVAO Morocco Website!',
                'content' => 'We are excited to launch our new division website featuring a modern design, interactive vAIP, and real-time division activities. Explore the new features and let us know what you think!',
                'type' => 'announcement',
                'is_pinned' => true,
                'published_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Upcoming Online Day: Casablanca Night Out',
                'content' => 'Join us this Friday for our weekly Online Day! Full ATC coverage will be provided at GMMN, GMME, and GMMX. Don\'t miss the opportunity to fly in the Moroccan skies with full staffing.',
                'type' => 'news',
                'is_pinned' => false,
                'published_at' => Carbon::now()->subDay(),
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],
            [
                'title' => 'New Training Materials Published',
                'content' => 'The Training Department has updated the "Introduction to Moroccan VFR" guide. You can find it in the Learning Pathways section under Pilot Training.',
                'type' => 'announcement',
                'is_pinned' => false,
                'published_at' => Carbon::now()->subDays(2),
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
        ]);
    }
}
