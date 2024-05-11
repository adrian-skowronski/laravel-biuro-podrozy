<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\StartController;

Route::get('/',[StartController::class,'index']);


Route::get('/oferty', function () {
    return view('oferty');
})->name('oferty');

Route::resource('trips', TripsController::class);
Route::resource('start', StartController::class);