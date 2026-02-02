<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\IvaoFlightsService;

class HomeController extends Controller
{
    public function index(IvaoFlightsService $ivao)
    {
        $flights = $ivao->moroccanTraffic();
        // Fetch local database events for the calendar section (keep existing logic)
        $events = \App\Models\Event::orderBy('start_at', 'asc')
            ->where('end_at', '>=', now())
            ->take(4)
            ->get();

        // Fetch IVAO API Events for the new widget
        $ivaoEvents = $ivao->fetchUpcomingEvents();

        // Fetch active announcements
        $announcements = \App\Models\Announcement::query()
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('expires_at')
                    ->orWhere('expires_at', '>=', now());
            })
            ->orderBy('is_pinned', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Fetch live events (happening right now)
        $liveEvent = \App\Models\Event::query()
            ->where('start_at', '<=', now())
            ->where('end_at', '>=', now())
            ->orderBy('start_at', 'asc')
            ->first();

        // Fetch Active Virtual Airlines
        $virtualAirlines = \App\Models\VirtualAirline::where('is_active', true)
            ->orderBy('name', 'asc')
            ->get();

        return view('home', compact('flights', 'events', 'ivaoEvents', 'announcements', 'liveEvent', 'virtualAirlines'));
    }
}
