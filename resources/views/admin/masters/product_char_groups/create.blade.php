<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('product-char-groups.index') }}">Masters</a></li>
                <li><a href="{{ route('product-char-groups.index') }}">Product Char Groups</a></li>
                <li>Create Product Char Group</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Create New Product Char Group</h1>
            <a href="{{ route('product-char-groups.index') }}" class="btn btn-outline btn-neutral">Back to Product Char Groups</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('product-char-groups.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="w-full input input-primary focus:border-none" required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', false) ? 'checked' : '' }} class="checkbox checkbox-primary">
                                <span class="text-sm text-gray-700">Active</span>
                            </div>
                            @error('is_active')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-outline btn-primary">Create Product Char Group</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
