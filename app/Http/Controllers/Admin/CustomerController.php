<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 12);
        $perPage = min((int)$perPage, 100);

        $customers = Customer::query()->latest('id')->paginate($perPage);
        return response()->view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return response()->view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:customers,email'],
            'company' => ['nullable','string','max:255'],
            'phone' => ['nullable','string','max:50'],
            'address' => ['nullable','string','max:500'],
        ]);

        Customer::create($data);

        return redirect()->route('customers.index')->with('success','Customer created');
    }

    public function edit(Customer $customer)
    {
        return response()->view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('customers','email')->ignore($customer->id)],
            'company' => ['nullable','string','max:255'],
            'phone' => ['nullable','string','max:50'],
            'address' => ['nullable','string','max:500'],
        ]);

        $customer->update($data);

        return redirect()->route('customers.index')->with('success','Customer updated');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->with('success','Customer deleted');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('customer_ids', []);
        Customer::whereIn('id', $ids)->delete();
        return redirect()->route('customers.index')->with('success', 'Selected customers deleted successfully.');
    }
}

