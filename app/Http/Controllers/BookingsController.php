<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    public function store(Request $request)
    {
        $participants = $request->input('participants');
        $trip_id = $request->input('trip_id');
        $trip = Trip::find($trip_id);
        $user = Auth::user();

        // Walidacja danych wejściowych i użytkownika
        $validationResponse = $this->validateBooking($trip, $participants, $user);
        if ($validationResponse) {
            return $validationResponse;
        }

        DB::beginTransaction();

        try {
            // Tworzenie rezerwacji
            $this->createBooking($user, $trip, $participants);

            DB::commit();

            return redirect()->route('customer')->with('success', 'Rezerwacja zakończona pomyślnie.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('customer')->with('error', 'Wystąpił błąd podczas rezerwacji.');
        }
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
