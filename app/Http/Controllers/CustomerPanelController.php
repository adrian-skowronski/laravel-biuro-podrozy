<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingsController;
use App\Models\Booking;


class CustomerPanelController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $bookings = Booking::where('customer_id', $user->customer_id)->get();

    return view('customer_panel.index', ['bookings' => $bookings, 'customer' => $user]);
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
