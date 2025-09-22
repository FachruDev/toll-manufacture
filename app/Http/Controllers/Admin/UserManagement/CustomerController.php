<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::query()
            ->whereHas('roles', fn($q) => $q->where('name', 'customer'))
            ->with('roles')
            ->latest('id')
            ->paginate(12);

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'username' => ['nullable','string','max:255','unique:users,username'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required','min:8','confirmed'],
            'phone' => ['nullable','string','max:50'],
            'company' => ['nullable','string','max:255'],
        ]);

        $user = new User();
        $user->fill([
            'name' => $data['name'],
            'username' => $data['username'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
        ]);
        $user->password = Hash::make($data['password']);
        $user->save();

        $user->syncRoles(['customer']);

        Customer::create([
            'user_id' => $user->id,
            'company' => $data['company'] ?? null,
            'phone' => $data['phone'] ?? null,
        ]);

        return redirect()->route('admin.customers.index')->with('success','Customer created');
    }

    public function edit(User $customer)
    {
        if (! $customer->hasRole('customer')) abort(404);
        $profile = Customer::firstWhere('user_id', $customer->id);
        return view('admin.customers.edit', compact('customer','profile'));
    }

    public function update(Request $request, User $customer)
    {
        if (! $customer->hasRole('customer')) abort(404);

        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'username' => ['nullable','string','max:255', Rule::unique('users','username')->ignore($customer->id)],
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($customer->id)],
            'password' => ['nullable','min:8','confirmed'],
            'phone' => ['nullable','string','max:50'],
            'company' => ['nullable','string','max:255'],
        ]);

        $customer->fill([
            'name' => $data['name'],
            'username' => $data['username'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
        ]);
        if (!empty($data['password'])) {
            $customer->password = Hash::make($data['password']);
        }
        $customer->save();

        Customer::updateOrCreate(
            ['user_id' => $customer->id],
            ['company' => $data['company'] ?? null, 'phone' => $data['phone'] ?? null]
        );

        return redirect()->route('admin.customers.index')->with('success','Customer updated');
    }

    public function destroy(User $customer)
    {
        if (! $customer->hasRole('customer')) abort(404);
        $customer->delete();
        return back()->with('success','Customer deleted');
    }
}

