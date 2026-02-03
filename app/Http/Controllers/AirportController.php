<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function index()
    {
        return view('eaip.index');
    }
}
