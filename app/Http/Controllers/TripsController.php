<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', ['trips' => $trips]);
    }
   

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trips.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'price' => 'required|numeric',
            'description' => 'required',
            'max_participants' => 'required|numeric',
            'current_participants' => 'required|numeric|lte:max_participants',
            'status' => 'required|in:aktualna,archiwalna',
            'coordinator_id' => 'required|numeric',
            'photo' => 'required',
        ]);

        Trip::create($validatedData);

        return redirect()->route('trips.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
{
    return view('trips.show', compact('trip'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        
        $trip = Trip::find($trip->trip_id);

        return view('trips.edit', ['trip'=>$trip]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'price' => 'required|numeric',
            'description' => 'required',
            'max_participants' => 'required|numeric',
            'current_participants' => 'required|numeric|lte:max_participants',
            'status' => 'required|in:aktualna,archiwalna',
            'coordinator_id' => 'required|numeric',
            'photo' => 'required',
        ]);
    
        $trip->update($validatedData); 
    
        return redirect()->route('trips.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index'); 
    }
}
