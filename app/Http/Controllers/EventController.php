<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = \App\Models\Event::orderBy('start_at', 'asc')->get();
        return view('events.index', compact('events'));
    }
}
