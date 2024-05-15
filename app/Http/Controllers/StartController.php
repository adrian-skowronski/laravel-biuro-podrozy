<?php

namespace App\Http\Controllers;
use App\Models\Trip;
use Illuminate\Http\Request;


class StartController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('start.index', ['trips' => $trips]);
    }

    public function oferty()
    {
        $trips = Trip::all();
        return view('start.oferty', ['trips' => $trips]);
    }
}
