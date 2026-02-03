<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EAIPController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/airports', [EAIPController::class, 'getAirports']);
Route::get('/airport/{icao}', [EAIPController::class, 'getAirport']);
Route::get('/metar/{icao}', [EAIPController::class, 'getMetar']);
