<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 12);
        $perPage = min((int)$perPage, 100);

        $departments = Department::orderBy('name')->paginate($perPage);
        return response()->view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return response()->view('admin.departments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255','unique:departments,name'],
        ]);

        Department::create($data);

        return redirect()->route('admin.departments.index')->with('success','Department created');
    }

    public function edit(Department $department)
    {
        return response()->view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255', Rule::unique('departments','name')->ignore($department->id)],
        ]);

        $department->update($data);

        return redirect()->route('admin.departments.index')->with('success','Department updated');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return back()->with('success','Department deleted');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('department_ids', []);
        Department::whereIn('id', $ids)->delete();
        return redirect()->route('departments.index')->with('success', 'Selected departments deleted successfully.');
    }
}

