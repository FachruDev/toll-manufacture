<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\ProductCharGroup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductCharGroupController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 12);
        $perPage = min((int)$perPage, 100);

        $items = ProductCharGroup::orderBy('title')->paginate($perPage);
        return response()->view('admin.masters.product_char_groups.index', compact('items'));
    }

    public function create()
    {
        return response()->view('admin.masters.product_char_groups.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255','unique:product_char_groups,title'],
            'is_active' => ['nullable','boolean']
        ]);
        ProductCharGroup::create([
            'title' => $data['title'],
            'is_active' => $request->boolean('is_active', false),
        ]);
        return redirect()->route('product-char-groups.index')->with('success','Saved');
    }

    public function edit(ProductCharGroup $product_char_group)
    {
        return response()->view('admin.masters.product_char_groups.edit', compact('product_char_group'));
    }

    public function update(Request $request, ProductCharGroup $product_char_group)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255', Rule::unique('product_char_groups','title')->ignore($product_char_group->id)],
            'is_active' => ['nullable','boolean']
        ]);
        $product_char_group->update([
            'title' => $data['title'],
            'is_active' => $request->boolean('is_active', false),
        ]);
        return redirect()->route('product-char-groups.index')->with('success','Updated');
    }

    public function destroy(ProductCharGroup $product_char_group)
    {
        $product_char_group->delete();
        return back()->with('success','Deleted');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('item_ids', []);
        ProductCharGroup::whereIn('id', $ids)->delete();
        return redirect()->route('product-char-groups.index')->with('success', 'Selected product char groups deleted successfully.');
    }
}

