<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IvaoFlightsService;

class IvaoController extends Controller
{
    public function refresh(IvaoFlightsService $ivao)
    {
        $flights = $ivao->moroccanFlights();
        return response()->json($flights);
    }
}
