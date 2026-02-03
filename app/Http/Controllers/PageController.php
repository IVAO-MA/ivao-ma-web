<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        return view('pages.about-us');
    }

    public function divisionTransfer()
    {
        return view('pages.division-transfer');
    }

    public function becomeAtc()
    {
        return view('pages.become-atc');
    }

    public function becomePilot()
    {
        return view('pages.become-pilot');
    }

    public function trainingRequest()
    {
        return view('pages.training-request');
    }

    public function exams()
    {
        return view('pages.exams');
    }

    public function gca()
    {
        return view('pages.gca');
    }
}
