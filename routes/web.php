<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\WikiController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/airports', [AirportController::class, 'index'])->name('airports.index');
Route::get('/wiki', [WikiController::class, 'index'])->name('wiki.index');
Route::get('/wiki/{slug}', [WikiController::class, 'show'])->name('wiki.show');
Route::get('/learning-pathways', [App\Http\Controllers\LearningPathwayController::class, 'index'])->name('learning-pathways.index');

// Placeholder Routes for Menu Items
Route::view('/virtual-airlines', 'coming-soon')->name('virtual-airlines.index');
Route::view('/coming-soon', 'coming-soon')->name('coming-soon');

Route::get('locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('locale');

Route::post('/ivao/refresh', [App\Http\Controllers\IvaoController::class, 'refresh'])->name('ivao.refresh');

// Dismiss live event banner
Route::post('/dismiss-live-event/{event}', function ($eventId) {
    session(['dismissed_live_event_' . $eventId => true]);
    return redirect()->back();
})->name('dismiss-live-event');
