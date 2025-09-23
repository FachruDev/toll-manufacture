<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);
        $permissions = Permission::orderBy('name')->paginate($perPage);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required','string','max:255',
                Rule::unique('permissions','name')->where('guard_name','web')
            ],
        ]);

        Permission::create(['name' => $data['name'], 'guard_name' => 'web']);

        return redirect()->route('permissions.index')->with('success','Permission created');
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => [
                'required','string','max:255',
                Rule::unique('permissions','name')->where('guard_name','web')->ignore($permission->id)
            ],
        ]);

        $permission->update(['name' => $data['name']]);

        return redirect()->route('permissions.index')->with('success','Permission updated');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('success','Permission deleted');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'permission_ids' => 'required|array',
            'permission_ids.*' => 'exists:permissions,id',
        ]);

        Permission::whereIn('id', $request->permission_ids)->delete();

        return redirect()->route('permissions.index')->with('success', 'Selected permissions deleted successfully.');
    }
}

