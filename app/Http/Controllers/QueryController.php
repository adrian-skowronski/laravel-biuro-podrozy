<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;

class QueryController extends Controller
{
    public function index()
    {
        $queries = Query::all();
        return view('queries.index', ['queries' => $queries]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mail' => 'required|email',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Query::create($validatedData);

        return redirect()->back()->with('success', 'Zapytanie zostało wysłane.');
    }

    public function destroy($id)
{
    $query = Query::findOrFail($id);
    $query->delete();

    return redirect()->route('queries.index')->with('success', 'Zapytanie zostało usunięte.');
}

}

