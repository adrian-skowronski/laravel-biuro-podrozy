<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Pobranie danych z formularza
        $participants = $request->input('participants');
        $trip_id = $request->input('trip_id'); // Jeśli potrzebne

        // Pobranie wycieczki na podstawie ID
        $trip = Trip::find($trip_id);

        // Sprawdzenie, czy wycieczka istnieje
        if (!$trip) {
            return back()->with('error', 'Wycieczka nie istnieje.');
        }

        // Sprawdzenie, czy liczba uczestników nie przekracza dostępnej liczby miejsc
        if ($participants > $trip->max_participants - $trip->current_participants) {
            return back()->with('error', 'Liczba uczestników przekracza dostępną liczbę miejsc.');
        }

        // Pobranie zalogowanego użytkownika
        $user = Auth::user();

        // Sprawdzenie, czy użytkownik ma wystarczające saldo
        if ($user->balance < $participants * $trip->price) {
            return back()->with('error', 'Niewystarczające saldo na koncie.');
        }

        // Rozpoczęcie transakcji
        DB::beginTransaction();

        try {
            // Tworzenie nowej rezerwacji
            $booking = new Booking();
            $booking->customer_id = $user->id;
            $booking->trip_id = $trip->id;
            $booking->participants = $participants;
            $booking->status = 'opłacona'; // Możesz ustawić inny status na potrzeby Twojej aplikacji
            $booking->save();

            // Zaktualizowanie liczby aktualnych uczestników w wycieczce
            $trip->current_participants += $participants;
            $trip->save();

            // Zaktualizowanie salda użytkownika
            $user->balance -= $participants * $trip->price;
            $user->save();

            // Zatwierdzenie transakcji
            DB::commit();

            return redirect()->route('success')->with('success', 'Rezerwacja zakończona pomyślnie.');
        } catch (\Exception $e) {
            // W przypadku błędu, cofnięcie transakcji
            DB::rollBack();

            return back()->with('error', 'Wystąpił błąd podczas rezerwacji.');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
