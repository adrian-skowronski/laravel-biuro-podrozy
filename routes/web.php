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
use App\Http\Controllers\QueryController;
use App\Http\Controllers\CustomerPanelController;
use App\Http\Controllers\TripsHillsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TripStatusViewController;


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



Route::resource('start', StartController::class);
require __DIR__.'/auth.php';



Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('trips', TripsController::class);
    Route::resource('bookings', BookingsController::class);
    Route::resource('coordinators', CoordinatorsController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('hills', HillsController::class);
    Route::resource('record_holders', RecordHoldersController::class);
    Route::resource('trips_hills', TripsHillsController::class);
    Route::resource('blog_posts', BlogController::class);

    // Dodajemy zasoby dla bookings dla administratora
    Route::get('/admin/bookings', [BookingsController::class, 'adminIndex'])->name('admin.bookings.index');
    Route::get('/admin/bookings/create', [BookingsController::class, 'create'])->name('admin.bookings.create');
    Route::post('/admin/bookings', [BookingsController::class, 'adminStore'])->name('admin.bookings.store');
    Route::get('/admin/bookings/{booking}/edit', [BookingsController::class, 'edit'])->name('admin.bookings.edit');
    Route::put('/admin/bookings/{booking}', [BookingsController::class, 'update'])->name('admin.bookings.update');
    Route::delete('/admin/bookings/{booking}', [BookingsController::class, 'destroy'])->name('admin.bookings.destroy');
    

    

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

Route::post('/submit-query', [QueryController::class, 'store'])->name('queries.store');
Route::get('/trips/{trip}', [TripsController::class, 'show'])->name('trips.show');



route::middleware('auth')->group(function () {
    Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/klient', [CustomerPanelController::class, 'index'])->name('customer');
    Route::get('/klient/add_money', [CustomerPanelController::class, 'addMoney'])->name('customer.add_money');
    Route::post('/klient/add_money', [CustomerPanelController::class, 'addMoneySubmit'])->name('customer.add_money.submit');

    Route::get('/klient/bookings', [BookingsController::class, 'index'])->name('customer.bookings.index');
    Route::post('/trips/{trip}/booking/submit', [BookingsController::class, 'store'])->name('trips.booking.submit');
});


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::post('/submit-query', [QueryController::class, 'store'])->name('queries.store');
Route::get('/trips/{trip}', [TripsController::class, 'show'])->name('trips.show');


Route::get('/trips/{trip}/book', [TripsController::class, 'book'])->name('trips.book');
Route::post('/trips/{trip}/booking/submit', [BookingsController::class, 'store'])->name('trips.booking.submit');

Route::get('/queries', [QueryController::class, 'index'])->name('queries.index');
Route::delete('/queries/{id}', [QueryController::class, 'destroy'])->name('queries.destroy');