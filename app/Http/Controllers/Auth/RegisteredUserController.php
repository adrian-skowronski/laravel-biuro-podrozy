<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:9',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|confirmed|min:8',
            'code' => 'required|digits:4', // Walidacja dla dokładnie 4 cyfr
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'balance' => 0, // Ustawienie domyślnej wartości balance
            'code' => $request->code,
        ]);

        event(new Registered($customer));

        Auth::login($customer);

        return redirect()->route('start.index');
    }
}
