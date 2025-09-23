<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);
        $roles = Role::query()->with('permissions')->orderBy('name')->paginate($perPage);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name')->get(['id','name']);
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required','string','max:255',
                Rule::unique('roles','name')->where('guard_name', 'web')
            ],
            'permissions' => ['sometimes','array'],
            'permissions.*' => ['string','exists:permissions,name'],
        ]);

        $role = Role::create(['name' => $data['name'], 'guard_name' => 'web']);
        if (!empty($data['permissions'])) {
            $role->syncPermissions($data['permissions']);
        }

        return redirect()->route('admin.roles.index')->with('success','Role created');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get(['id','name']);
        $role->load('permissions');
        return view('admin.roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => [
                'required','string','max:255',
                Rule::unique('roles','name')->where('guard_name','web')->ignore($role->id)
            ],
            'permissions' => ['sometimes','array'],
            'permissions.*' => ['string','exists:permissions,name'],
        ]);

        $role->update(['name' => $data['name']]);
        if ($request->has('permissions')) {
            $role->syncPermissions($data['permissions'] ?? []);
        }

        return redirect()->route('admin.roles.index')->with('success','Role updated');
    }

    public function destroy(Role $role)
    {
        if (in_array($role->name, ['superadmin'])) {
            return back()->withErrors(['name' => 'Cannot delete protected role.']);
        }
        $role->delete();
        return back()->with('success','Role deleted');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id',
        ]);

        $roles = Role::whereIn('id', $request->role_ids)->get();
        foreach ($roles as $role) {
            if (in_array($role->name, ['superadmin'])) {
                return back()->withErrors(['name' => 'Cannot delete protected role: ' . $role->name]);
            }
        }

        Role::whereIn('id', $request->role_ids)->delete();

        return redirect()->route('roles.index')->with('success', 'Selected roles deleted successfully.');
    }
}

