<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('product-char-groups.index') }}">Masters</a></li>
                <li><a href="{{ route('product-char-groups.index') }}">Product Char Groups</a></li>
                <li>Edit Product Char Group</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Edit Product Char Group: {{ $product_char_group->title }}</h1>
            <a href="{{ route('product-char-groups.index') }}" class="btn btn-outline btn-neutral">Back to Product Char Groups</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('product-char-groups.update', $product_char_group) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                            <input type="text" name="title" value="{{ old('title', $product_char_group->title) }}" class="w-full input input-primary focus:border-none" required @cannot('edit-product-char-groups') readonly @endcannot>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product_char_group->is_active) ? 'checked' : '' }} class="checkbox checkbox-primary">
                                <span class="text-sm text-gray-700">Active</span>
                            </div>
                            @error('is_active')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @can('edit-product-char-groups')
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-outline btn-primary">Update Product Char Group</button>
                    </div>
                    @endcan

                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
