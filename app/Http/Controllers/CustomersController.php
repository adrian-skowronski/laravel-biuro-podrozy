<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'code' => 'nullable|string|max:10',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'code' => $request->code,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->customer_id . ',customer_id',
        'password' => 'nullable|string|min:8|confirmed',
        'phone' => 'required|string|max:15',
        'code' => 'nullable|string|max:10',
    ]);

    $customer->update([
        'name' => $request->name,
        'surname' => $request->surname,
        'email' => $request->email,
        'phone' => $request->phone,
        'code' => $request->code,
        'password' => $request->password ? Hash::make($request->password) : $customer->password,
    ]);

    return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
}

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}
