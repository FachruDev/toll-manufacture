<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\TechnicalMade;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TechnicalMadeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 12);
        $perPage = min((int)$perPage, 100);

        $items = TechnicalMade::orderBy('title')->paginate($perPage);
        return response()->view('admin.masters.technical_mades.index', compact('items'));
    }

    public function create()
    {
        return response()->view('admin.masters.technical_mades.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255','unique:technical_mades,title'],
            'is_active' => ['nullable','boolean']
        ]);
        TechnicalMade::create([
            'title' => $data['title'],
            'is_active' => $request->boolean('is_active', false),
        ]);
        return redirect()->route('technical-mades.index')->with('success','Saved');
    }

    public function edit(TechnicalMade $technical_made)
    {
        return response()->view('admin.masters.technical_mades.edit', compact('technical_made'));
    }

    public function update(Request $request, TechnicalMade $technical_made)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255', Rule::unique('technical_mades','title')->ignore($technical_made->id)],
            'is_active' => ['nullable','boolean']
        ]);
        $technical_made->update([
            'title' => $data['title'],
            'is_active' => $request->boolean('is_active', false),
        ]);
        return redirect()->route('technical-mades.index')->with('success','Updated');
    }

    public function destroy(TechnicalMade $technical_made)
    {
        $technical_made->delete();
        return back()->with('success','Deleted');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('item_ids', []);
        TechnicalMade::whereIn('id', $ids)->delete();
        return redirect()->route('technical-mades.index')->with('success', 'Selected technical mades deleted successfully.');
    }
}

