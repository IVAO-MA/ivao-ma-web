<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function index()
    {
        $airports = \App\Models\Airport::orderBy('icao', 'asc')->get();
        return view('airports.index', compact('airports'));
    }
}
