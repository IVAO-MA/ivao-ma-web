<?php

namespace App\Http\Controllers;

use App\Models\VirtualAirline;
use Illuminate\Http\Request;

class VirtualAirlineController extends Controller
{
    public function index()
    {
        $virtualAirlines = VirtualAirline::where('is_active', true)
            ->orderBy('name', 'asc')
            ->get();

        return view('virtual-airlines.index', compact('virtualAirlines'));
    }
}
