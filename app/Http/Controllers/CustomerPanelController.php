<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerPanelController extends Controller
{
    public function index()
    {
        $customer = Auth::user();
        return view('customer_panel.index', compact('customer'));
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
