<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->whereHas('roles', fn($q) => $q->whereIn('name', ['superadmin','admin','dephead','supervisor']))
            ->with(['roles','department'])
            ->latest('id')
            ->paginate(12);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::whereIn('name', ['superadmin','admin','dephead','supervisor'])->pluck('name','id');
        $departments = Department::orderBy('name')->get(['id','name']);
        return view('admin.users.create', compact('roles','departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'username' => ['required','string','max:255','unique:users,username'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required','min:8','confirmed'],
            'employee_id' => ['nullable','string','max:255','unique:users,employee_id'],
            'phone' => ['nullable','string','max:50'],
            'department_id' => ['nullable','exists:departments,id'],
            'image' => ['nullable','image','max:2048'],
            'roles' => ['required','array','min:1'],
            'roles.*' => ['string', Rule::in(['superadmin','admin','dephead','supervisor'])],
        ]);

        $user = new User();
        $user->fill(collect($data)->except(['password','image','roles'])->all());
        $user->password = Hash::make($data['password']);

        if ($request->hasFile('image')) {
            $user->image_path = $request->file('image')->store('avatars','public');
        }

        $user->save();

        $user->syncRoles($data['roles']);

        return redirect()->route('admin.users.index')->with('success','User created');
    }

    public function edit(User $user)
    {
        $this->authorizeView($user);
        $roles = Role::whereIn('name', ['superadmin','admin','dephead','supervisor'])->pluck('name','id');
        $departments = Department::orderBy('name')->get(['id','name']);
        return view('admin.users.edit', compact('user','roles','departments'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorizeView($user);
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'username' => ['required','string','max:255', Rule::unique('users','username')->ignore($user->id)],
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
            'password' => ['nullable','min:8','confirmed'],
            'employee_id' => ['nullable','string','max:255', Rule::unique('users','employee_id')->ignore($user->id)],
            'phone' => ['nullable','string','max:50'],
            'department_id' => ['nullable','exists:departments,id'],
            'image' => ['nullable','image','max:2048'],
            'roles' => ['required','array','min:1'],
            'roles.*' => ['string', Rule::in(['superadmin','admin','dephead','supervisor'])],
        ]);

        $user->fill(collect($data)->except(['password','image','roles'])->all());
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        if ($request->hasFile('image')) {
            $user->image_path = $request->file('image')->store('avatars','public');
        }
        $user->save();

        $user->syncRoles($data['roles']);

        return redirect()->route('admin.users.index')->with('success','User updated');
    }

    public function destroy(User $user)
    {
        $this->authorizeView($user);
        $user->delete();
        return back()->with('success','User deleted');
    }

    protected function authorizeView(User $user): void
    {
        // Ensure this controller only manages non-customer users
        if ($user->hasRole('customer')) {
            abort(403);
        }
    }
}

