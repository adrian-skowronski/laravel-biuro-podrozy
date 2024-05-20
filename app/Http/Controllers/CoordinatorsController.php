<?php

namespace App\Http\Controllers;

use App\Models\Coordinator;
use Illuminate\Http\Request;

class CoordinatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coordinators = Coordinator::all();
        return view('coordinators.index', ['coordinators' => $coordinators]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coordinators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:40',
            'surname' => 'required|string|max:40',
        ]);

        Coordinator::create($validatedData);

        return redirect()->route('coordinators.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coordinator $coordinator)
    {
        return view('coordinators.show', ['coordinator' => $coordinator]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coordinator $coordinator)
    {
        return view('coordinators.edit', ['coordinator' => $coordinator]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coordinator $coordinator)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:40',
            'surname' => 'required|string|max:40',
        ]);

        $coordinator->update($validatedData);

        return redirect()->route('coordinators.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinator $coordinator)
    {
        $coordinator->delete();
        return redirect()->route('coordinators.index');
    }
}
