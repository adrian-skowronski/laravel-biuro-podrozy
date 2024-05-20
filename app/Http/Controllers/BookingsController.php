<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', ['bookings' => $bookings]);
    }

    public function create()
    {
        $trips = Trip::all();
        return view('bookings.create', ['trips' => $trips]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,trip_id',
            'participants' => 'required|integer|min:1',
        ]);

        $trip = Trip::find($validatedData['trip_id']);
        $user = Auth::user();

        $validationResponse = $this->validateBooking($trip, $validatedData['participants'], $user);
        if ($validationResponse) {
            return $validationResponse;
        }

        DB::beginTransaction();

        try {
            $this->createBooking($user, $trip, $validatedData['participants']);
            DB::commit();
            return redirect()->route('customer')->with('success', 'Rezerwacja zakończona pomyślnie.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('customer')->with('error', 'Wystąpił błąd podczas rezerwacji.');
        }
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', ['booking' => $booking]);
    }

    public function edit(Booking $booking)
    {
        $trips = Trip::all();
        return view('bookings.edit', ['booking' => $booking, 'trips' => $trips]);
    }

    public function update(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,trip_id',
            'participants' => 'required|integer|min:1',
        ]);

        $trip = Trip::find($validatedData['trip_id']);

        $booking->update($validatedData);
        return redirect()->route('bookings.index');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index');
    }

    private function validateBooking($trip, $participants, $user)
    {
        if (!$trip) {
            return redirect()->route('customer')->with('error', 'Wycieczka nie istnieje.');
        }

        if ($participants > $trip->max_participants - $trip->current_participants) {
            return redirect()->route('customer')->with('error', 'Liczba uczestników przekracza dostępną liczbę miejsc.');
        }

        if (!$user) {
            return redirect()->route('customer')->with('error', 'Użytkownik niezalogowany.');
        }

        if ($user->balance < $participants * $trip->price) {
            return redirect()->route('customer')->with('error', 'Niewystarczające saldo na koncie.');
        }

        return null;
    }

    private function createBooking($user, $trip, $participants)
    {
        $booking = new Booking();
        $booking->customer_id = $user->customer_id;
        $booking->trip_id = $trip->trip_id;
        $booking->participants = $participants;
        $booking->price = $participants * $trip->price;
        $booking->save();

        $trip->current_participants += $participants;
        $trip->save();

        $user->balance -= $participants * $trip->price;
        $user->save();
    }
}
