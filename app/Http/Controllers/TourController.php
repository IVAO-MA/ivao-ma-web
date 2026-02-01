<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        return redirect()->away('https://tours.ivao.aero');
    }
}
