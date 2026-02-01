<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\IvaoFlightsService;

class HomeController extends Controller
{
    public function index(IvaoFlightsService $ivao)
    {
        $flights = $ivao->moroccanFlights();
        return view('home', compact('flights'));
    }
}
