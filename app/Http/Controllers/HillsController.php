<?php

namespace App\Http\Controllers;

use App\Models\Hill;
use Illuminate\Http\Request;

class HillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hills = Hill::all();
        return view('hills.index', ['hills' => $hills]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'country' => 'required',
        'city' => 'required',
        'build_year' => 'required|numeric',
        'hill_size' => 'required|numeric',
        'record' => 'required',
        'record_holder_id' => 'required|numeric',
    ]);

    Hill::create($validatedData);

    return redirect()->route('hills.index');
}


    /**
     * Display the specified resource.
     */
    public function show(Hill $hill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hill $hill)
    {
        $hill = Hill::find($hill->hill_id);

        return view('hills.edit', ['hill'=>$hill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hill $hill)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'country' => 'required',
        'city' => 'required',
        'build_year' => 'required|numeric',
        'hill_size' => 'required|numeric',
        'record' => 'required',
        'record_holder_id' => 'required|numeric',
        'photo' => 'required',
    ]);

    $hill->update($validatedData); 

    return redirect()->route('hills.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hill $hill)
    {
        $hill->delete();
        return redirect()->route('hills.index');
    }
}
