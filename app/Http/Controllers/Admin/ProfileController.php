<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $departments = Department::orderBy('name')->get(['id','name']);
        return view('admin.profile.edit', compact('user','departments'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $request->merge([
            'department_id' => $request->input('department_id') ?: null,
        ]);

        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255', Rule::unique('users','email')->ignore($user->id)],
            'employee_id' => ['nullable','string','max:255', Rule::unique('users','employee_id')->ignore($user->id)],
            'phone' => ['nullable','string','max:50'],
            'department_id' => ['nullable','integer','exists:departments,id'],
            'image' => ['nullable','image','max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('avatars','public');
            $data['image_path'] = $path;
        }

        unset($data['image']);
        $user->update($data);

        return back()->with('success','Profile updated');
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'current_password' => ['required','current_password'],
            'password' => ['required','confirmed','min:8'],
        ]);

        $user->update(['password' => $validated['password']]);
        return back()->with('success','Password updated');
    }
}
