<?php

namespace App\Http\Controllers;

use App\Models\Record_Holder;
use Illuminate\Http\Request;

class RecordHoldersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recordHolders = Record_holder::all();
        return view('record_holders.index', ['recordHolders' => $recordHolders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('record_holders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'surname' => 'required|string|max:40',
            'country' => 'required|string|max:30',
        ]);

        Record_Holder::create($validatedData);

        return redirect()->route('record_holders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record_Holder $record_holder)
    {
        return view('record_holders.show', ['recordHolder' => $record_holder]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record_Holder $record_holder)
{
    return view('record_holders.edit', ['recordHolder' => $record_holder]);
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record_Holder $recordHolder)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:30',
        'surname' => 'required|string|max:40',
        'country' => 'required|string|max:30',
    ]);

    $recordHolder->update($validatedData);

    return redirect()->route('record_holders.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record_Holder $recordHolder)
{
    $recordHolder->delete();
    return redirect()->route('record_holders.index');
}
}
