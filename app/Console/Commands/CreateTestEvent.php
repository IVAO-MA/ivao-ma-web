<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateTestEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-test-event';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Creating test live event...');
        
        $event = \App\Models\Event::where('start_at', '<=', now())
            ->where('end_at', '>=', now())
            ->first();

        if ($event) {
            $this->info('Active event already exists: ' . ($event->title['en'] ?? 'Untitled'));
            return;
        }

        \App\Models\Event::create([
            'title' => ['en' => 'Test Live Event - System Check'],
            'description' => ['en' => 'This is a test event created to verify the banner visibility.'],
            'start_at' => now()->subHour(),
            'end_at' => now()->addHour(),
            'type' => 'Event',
            'slug' => 'test-live-event-' . uniqid(),
            'image_path' => null,
        ]);

        $this->info('Test live event created successfully!');
    }
}
