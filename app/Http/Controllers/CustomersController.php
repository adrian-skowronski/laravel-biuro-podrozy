<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    // Przykładowe metody kontrolera

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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
            'code' => 'nullable|string|max:10',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Customer::create($validatedData);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:customers,email,'.$customer->customer_id,
            'password' => 'nullable|string|min:8|confirmed',
            'code' => 'nullable|string|max:10',
            'balance' => 'nullable',
            'role_id' => 'required',
        ]);
    
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
    
        $customer->update($validatedData);
    
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }
    

    public function destroy($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
