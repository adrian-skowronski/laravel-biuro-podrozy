<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    public function Uindex()
    {
        $user = Auth::user();
        $bookings = $user->customer->bookings;
        dd($bookings);
        return view('customer_panel.index', compact('bookings'));
    }
    

    // Metoda do wyświetlania wszystkich rezerwacji dla administratora
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $trips = Trip::all();
        return view('bookings.create', compact('trips'));
    }

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

    public function adminStore(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'trip_id' => 'required|exists:trips,trip_id',
            'participants' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Booking::create($validatedData);

        return redirect()->route('bookings.index')->with('success', 'Rezerwacja została pomyślnie utworzona.');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id); // Pobieramy rezerwację o danym ID
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id); // Pobieramy rezerwację o danym ID

        // Walidacja danych wejściowych
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'trip_id' => 'required',
            'participants' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Aktualizacja danych rezerwacji
        $booking->customer_id = $request->input('customer_id');
        $booking->trip_id = $request->input('trip_id');
        $booking->participants = $request->input('participants');
        $booking->price = $request->input('price');
        $booking->save();

        // Przekierowanie po zaktualizowaniu rezerwacji
        return redirect()->route('bookings.index')->with('success', 'Rezerwacja została zaktualizowana.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Rezerwacja została pomyślnie usunięta.');
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