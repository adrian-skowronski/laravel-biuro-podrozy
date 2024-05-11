<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripsController;


Route::get('/', function () {
    return view('index');
});


Route::get('/oferty', function () {
    return view('oferty');
})->name('oferty');

Route::resource('trips', TripsController::class);