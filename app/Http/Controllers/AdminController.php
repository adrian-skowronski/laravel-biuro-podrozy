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

        
        return view('admin.index', compact('tables',));
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
