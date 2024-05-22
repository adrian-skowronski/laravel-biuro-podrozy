<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingsController;
use App\Models\Booking;
use App\Models\SortedBookingAsc;
use App\Models\SortedBookingDesc;


class CustomerPanelController extends Controller
{
    public function index(Request $request)
    {
        $customer  = Auth::user();

        if (!$customer) {
            return redirect()->route('/')->with('error', 'Brak powiązanego klienta.');
        }

        $sortOrder = $request->input('sort', 'asc'); // Domyślnie sortuj rosnąco

        if ($sortOrder === 'asc') {
            $bookings = SortedBookingAsc::where('customer_id', $customer->customer_id)->get();
        } else {
            $bookings = SortedBookingDesc::where('customer_id', $customer->customer_id)->get();
        }

        return view('customer_panel.index', compact('customer', 'bookings'));
    }
    



    public function addMoney()
    {
        return view('customer_panel.add_money');
    }

    public function addMoneySubmit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'code' => 'required|string|size:4',
        ]);

        $customer = Auth::user();

        if ($customer->code !== $request->code) {
            return redirect()->route('customer.add_money')
                             ->withErrors(['code' => 'Podany kod jest nieprawidłowy.'])
                             ->with('error', 'Błąd - saldo nie zostało zaktualizowane');
        }

        $customer->balance += $request->amount;
        $customer->save();

        return redirect()->route('customer')->with('success', 'Saldo zostało doładowane.');
    }
}
