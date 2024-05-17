<?php

namespace App\Http\Controllers;

use App\Models\Trip_Hill;
use Illuminate\Http\Request;

class TripsHillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips_hills = Trip_Hill::with('trip', 'hill')->get();
        
        return view('trips_hills.index', ['trips_hills' => $trips_hills]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trips_hills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|numeric',
            'hill_id' => 'required|numeric',
        ]);

        Trip_Hill::create($validatedData);

        return redirect()->route('trips_hills.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $trip_hill = Trip_Hill::findOrFail($id);
    return view('trips_hills.edit', compact('trip_hill'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $trip_hill = Trip_Hill::find($id);

    $validatedData = $request->validate([
        'trip_id' => 'required|numeric',
        'hill_id' => 'required|numeric',
    ]);

    $trip_hill->update($validatedData);

    return redirect()->route('trips_hills.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trip->delete();
        return redirect()->route('trips_hills.index');
    }
}
