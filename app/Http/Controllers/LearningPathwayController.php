<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearningPathwayController extends Controller
{
    public function index()
    {
        return view('learning-pathways');
    }
}
