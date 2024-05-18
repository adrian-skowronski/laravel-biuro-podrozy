<?php

namespace App\Http\Controllers;
use App\Models\Trip;
use App\Models\Blog;
use Illuminate\Http\Request;


class StartController extends Controller
{
    public function index()
    {
        $trips = Trip::all(); // Pobierz wszystkie wycieczki
        $latestPosts = Blog::latest()->take(3)->get(); // Pobierz najnowszy wpis z bloga

        return view('start.index', compact('trips', 'latestPosts')); // Przekaż oba zestawy danych do widoku
    }

    public function oferty()
    {
        $trips = Trip::all();
        return view('start.oferty', ['trips' => $trips]);
    }
}
