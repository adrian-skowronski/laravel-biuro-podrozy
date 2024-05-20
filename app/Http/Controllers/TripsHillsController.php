<?php
namespace App\Http\Controllers;

use App\Models\Trip_Hill;
use App\Models\Trip;
use App\Models\Hill;
use Illuminate\Http\Request;

class TripsHillsController extends Controller
{
    // Wyświetlanie listy połączeń
    public function index()
    {
        $trips_hills = Trip_Hill::with('trip', 'hill')->get();
        return view('trips_hills.index', ['trips_hills' => $trips_hills]);
    }

    // Wyświetlanie formularza tworzenia nowego połączenia
    public function create()
    {
        $trips = Trip::all();
        $hills = Hill::all();
        return view('trips_hills.create', compact('trips', 'hills'));
    }

    // Przechowywanie nowego połączenia
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|numeric',
            'hill_id' => 'required|numeric',
        ]);

        Trip_Hill::create($validatedData);

        return redirect()->route('trips_hills.index')->with('success', 'Połączenie zostało dodane.');
    }

    // Wyświetlanie formularza edycji istniejącego połączenia
    public function edit($id)
    {
        $trip_hill = Trip_Hill::findOrFail($id);
        $trips = Trip::all();
        $hills = Hill::all();
        return view('trips_hills.edit', compact('trip_hill', 'trips', 'hills'));
    }

    // Aktualizowanie istniejącego połączenia
    public function update(Request $request, $id)
    {
        $trip_hill = Trip_Hill::findOrFail($id);

        $validatedData = $request->validate([
            'trip_id' => 'required|numeric',
            'hill_id' => 'required|numeric',
        ]);

        $trip_hill->update($validatedData);

        return redirect()->route('trips_hills.index')->with('success', 'Połączenie zostało zaktualizowane.');
    }

    // Usuwanie istniejącego połączenia
    public function destroy($id)
    {
        $trip_hill = Trip_Hill::findOrFail($id);
        $trip_hill->delete();
        return redirect()->route('trips_hills.index')->with('success', 'Połączenie zostało usunięte.');
    }
}
