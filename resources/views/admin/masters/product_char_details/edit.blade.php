<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('product-char-details.index') }}">Masters</a></li>
                <li><a href="{{ route('product-char-details.index') }}">Product Char Details</a></li>
                <li>Edit Product Char Detail</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Edit Product Char Detail: {{ $product_char_detail->field_title }}</h1>
            <a href="{{ route('product-char-details.index') }}" class="btn btn-outline btn-neutral">Back to Product Char Details</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('product-char-details.update', $product_char_detail) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Char Group *</label>
                            <select name="product_char_group_id" class="w-full select select-primary focus:border-none" required @cannot('edit-product-char-details') disabled @endcannot>
                                <option value="">Select Group</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" {{ old('product_char_group_id', $product_char_detail->product_char_group_id) == $group->id ? 'selected' : '' }}>{{ $group->title }}</option>
                                @endforeach
                            </select>
                            @error('product_char_group_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Field Title *</label>
                            <input type="text" name="field_title" value="{{ old('field_title', $product_char_detail->field_title) }}" class="w-full input input-primary focus:border-none" required @cannot('edit-product-char-details') readonly @endcannot>
                            @error('field_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Input Type</label>
                            <select name="input_type" class="w-full select select-primary focus:border-none" @cannot('edit-product-char-details') disabled @endcannot>
                                <option value="text" {{ old('input_type', $product_char_detail->input_type ?? 'text') == 'text' ? 'selected' : '' }}>Text</option>
                                <option value="number" {{ old('input_type', $product_char_detail->input_type) == 'number' ? 'selected' : '' }}>Number</option>
                                <option value="textarea" {{ old('input_type', $product_char_detail->input_type) == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                <option value="select" {{ old('input_type', $product_char_detail->input_type) == 'select' ? 'selected' : '' }}>Select</option>
                                <option value="checkbox" {{ old('input_type', $product_char_detail->input_type) == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                                <option value="radio" {{ old('input_type', $product_char_detail->input_type) == 'radio' ? 'selected' : '' }}>Radio</option>
                                <option value="date" {{ old('input_type', $product_char_detail->input_type) == 'date' ? 'selected' : '' }}>Date</option>
                            </select>
                            @error('input_type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Required</label>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="is_required" value="1" {{ old('is_required', $product_char_detail->is_required) ? 'checked' : '' }} class="checkbox checkbox-primary" @cannot('edit-product-char-details') disabled @endcannot>
                                <span class="text-sm text-gray-700">Required field</span>
                            </div>
                            @error('is_required')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @can('edit-product-char-details')
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-outline btn-primary">Update Product Char Detail</button>
                    </div>
                    @endcan

                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
