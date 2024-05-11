<?php

use App\Http\Controllers\HillController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/oferty', function () {
    return view('oferty');
})->name('oferty');



Route::get('/hills', [HillController::class, 'index']);