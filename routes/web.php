<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/oferty', function () {
    return view('oferty');
})->name('oferty');