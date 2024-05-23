<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    public function index()
    {
        $customer = auth()->user(); // Zalogowany klient
        $bookings = $customer->bookings; // Zakładając, że relacja jest poprawnie zdefiniowana w modelu Customer
        return view('customer_panel.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $participants = $request->input('participants');
        $trip_id = $request->input('trip_id');
        $customer = auth()->user(); // Zalogowany klient

        // Walidacja danych wejściowych i klienta
        $validationResponse = $this->validateBooking($trip_id, $participants, $customer);
        if ($validationResponse) {
            return $validationResponse;
        }

        try {
            // WYWOŁANIE PROCEDURY
            DB::statement('CALL make_booking(?, ?, ?)', [$customer->customer_id, $trip_id, $participants]);

            return redirect()->route('customer')->with('success', 'Rezerwacja zakończona pomyślnie.');
        } catch (\Exception $e) {
            return redirect()->route('customer')->with('error', 'Wystąpił błąd podczas rezerwacji.');
        }
    }

    private function validateBooking($trip_id, $participants, $customer)
    {
        $trip = Trip::find($trip_id);

        if (!$trip) {
            return redirect()->route('customer')->with('error', 'Wycieczka nie istnieje.');
        }

        if ($participants > $trip->max_participants - $trip->current_participants) {
            return redirect()->route('customer')->with('error', 'Liczba uczestników przekracza dostępną liczbę miejsc.');
        }

        if (!$customer) {
            return redirect()->route('customer')->with('error', 'Klient niezalogowany.');
        }

        if ($customer->balance < $participants * $trip->price) {
            return redirect()->route('customer')->with('error', 'Niewystarczające saldo na koncie.');
        }

        return null;
    }
}
