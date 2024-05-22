<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Trip;

class AdminController extends Controller
{
    public function index()
    {
        $tables = ['trips', 'hills', 'trips_hills','record_holders','coordinators','blog_posts','customers', 'queries'];

        $trips = Trip::all();
        $statistics = [];

        foreach ($trips as $trip) {
            $tripId = $trip->trip_id;
            DB::statement('CALL count_bookings_with_cursor(?, @count)', [$tripId]);
            $result = DB::select('SELECT @count as booking_count');

            $statistics[] = [
                'trip' => $trip,
                'booking_count' => $result[0]->booking_count
            ];
        }

        return view('admin.index', compact('tables', 'statistics'));
    }

    public function showTable($table)
    {
        // Sprawdzanie, czy tabela istnieje w bazie danych
        if (!Schema::hasTable($table)) {
            return redirect()->route('admin.index')->with('error', 'Tabela nie istnieje.');
        }

        // Pobranie wszystkich rekordów z wybranej tabeli
        $records = DB::table($table)->get();

        // Przekazanie rekordów do widoku
        return view('admin.table', compact('table', 'records'));
    }
}
