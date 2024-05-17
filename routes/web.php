<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CoordinatorsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\HillsController;
use App\Http\Controllers\RecordHoldersController;
use App\Http\Controllers\StartController;
use App\Http\Middleware\AdminMiddleware;


Route::get('/', [StartController::class, 'index'])->name('start.index');

Route::get('/oferty', [StartController::class, 'oferty'])->name('start.oferty');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('trips', TripsController::class);
Route::resource('bookings', BookingsController::class);
Route::resource('coordinators', CoordinatorsController::class);
Route::resource('customers', CustomersController::class);
Route::resource('hills', HillsController::class);
Route::resource('record_holders', RecordHoldersController::class);


Route::resource('start', StartController::class);
require __DIR__.'/auth.php';

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

    Route::get('/admin/{table}', function ($table) {
        // Sprawdź, czy tabela istnieje
        if (Schema::hasTable($table)) {
            // Jeśli tabela istnieje, przekieruj do odpowiedniego kontrolera
            return redirect()->route($table . '.index');
        } else {
            // Jeśli tabela nie istnieje, przekieruj gdzieś indziej lub zwróć błąd 404
            abort(404);
        }
    })->name('admin.table');
});