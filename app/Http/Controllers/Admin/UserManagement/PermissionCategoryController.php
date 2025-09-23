<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\PermissionCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class PermissionCategoryController extends Controller
{
    public function index()
    {
        $categories = PermissionCategory::withCount('permissions')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(20);
        return response()->view('admin.permission-categories.index', compact('categories'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name')->get(['id','name']);
        return response()->view('admin.permission-categories.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255', Rule::unique('permission_categories','name')],
            'description' => ['nullable','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
            'permissions' => ['sometimes','array'],
            'permissions.*' => ['integer','exists:permissions,id'],
        ]);

        $category = PermissionCategory::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        if (!empty($data['permissions'])) {
            $category->permissions()->sync($data['permissions']);
        }

        return redirect()->route('admin.permission-categories.index')->with('success','Category created');
    }

    public function edit(PermissionCategory $permission_category)
    {
        $permissions = Permission::orderBy('name')->get(['id','name']);
        $permission_category->load('permissions');
        return response()->view('admin.permission-categories.edit', [
            'category' => $permission_category,
            'permissions' => $permissions,
        ]);
    }

    public function update(Request $request, PermissionCategory $permission_category)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255', Rule::unique('permission_categories','name')->ignore($permission_category->id)],
            'description' => ['nullable','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
            'permissions' => ['sometimes','array'],
            'permissions.*' => ['integer','exists:permissions,id'],
        ]);

        $permission_category->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        if ($request->has('permissions')) {
            $permission_category->permissions()->sync($data['permissions'] ?? []);
        }

        return redirect()->route('admin.permission-categories.index')->with('success','Category updated');
    }

    public function destroy(PermissionCategory $permission_category)
    {
        $permission_category->delete();
        return back()->with('success','Category deleted');
    }
}

