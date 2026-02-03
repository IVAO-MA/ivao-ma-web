<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function index()
    {
        return view('eaip.index');
    }

    public function list()
    {
        $airports = \App\Models\Airport::orderBy('icao')->get();
        return view('airports.index', compact('airports'));
    }
}
