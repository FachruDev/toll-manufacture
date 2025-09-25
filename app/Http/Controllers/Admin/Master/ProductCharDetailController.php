<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\ProductCharDetail;
use App\Models\ProductCharGroup;
use Illuminate\Http\Request;

class ProductCharDetailController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 12);
        $perPage = min((int)$perPage, 100);

        $items = ProductCharDetail::with('group')->orderBy('product_char_group_id')->orderBy('id')->paginate($perPage);
        return response()->view('admin.masters.product_char_details.index', compact('items'));
    }

    public function create()
    {
        $groups = ProductCharGroup::orderBy('title')->get(['id','title']);
        return response()->view('admin.masters.product_char_details.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_char_group_id' => ['required','exists:product_char_groups,id'],
            'field_title' => ['required','string','max:255'],
            'input_type' => ['nullable','string','max:50'],
            'is_required' => ['nullable','boolean'],
        ]);
        ProductCharDetail::create([
            'product_char_group_id' => $data['product_char_group_id'],
            'field_title' => $data['field_title'],
            'input_type' => $data['input_type'] ?? 'text',
            'is_required' => $request->boolean('is_required', false),
        ]);
        return redirect()->route('product-char-details.index')->with('success','Saved');
    }

    public function edit(ProductCharDetail $product_char_detail)
    {
        $groups = ProductCharGroup::orderBy('title')->get(['id','title']);
        return response()->view('admin.masters.product_char_details.edit', compact('product_char_detail','groups'));
    }

    public function update(Request $request, ProductCharDetail $product_char_detail)
    {
        $data = $request->validate([
            'product_char_group_id' => ['required','exists:product_char_groups,id'],
            'field_title' => ['required','string','max:255'],
            'input_type' => ['nullable','string','max:50'],
            'is_required' => ['nullable','boolean'],
        ]);
        $product_char_detail->update([
            'product_char_group_id' => $data['product_char_group_id'],
            'field_title' => $data['field_title'],
            'input_type' => $data['input_type'] ?? 'text',
            'is_required' => $request->boolean('is_required', false),
        ]);
        return redirect()->route('product-char-details.index')->with('success','Updated');
    }

    public function destroy(ProductCharDetail $product_char_detail)
    {
        $product_char_detail->delete();
        return back()->with('success','Deleted');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('item_ids', []);
        ProductCharDetail::whereIn('id', $ids)->delete();
        return redirect()->route('product-char-details.index')->with('success', 'Selected product char details deleted successfully.');
    }
}

