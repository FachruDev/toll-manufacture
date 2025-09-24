<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('permission-categories.index') }}">Permission Categories</a></li>
                <li>Edit {{ $category->name }}</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Edit Permission Category</h1>
            <a href="{{ route('permission-categories.index') }}" class="btn btn-outline btn-neutral">Back to Permission Categories</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <h1 class="text-2xl font-semibold text-primary mb-6">Edit Permission Category</h1>

                <form method="POST" action="{{ route('permission-categories.update', $category) }}">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                                   class="input focus:border-none input-primary w-full @error('name') input-error @enderror"
                                   required>
                            @error('name')
                                <p class="text-error text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" id="description" rows="3"
                                      class="textarea focus:border-none textarea-primary w-full @error('description') textarea-error @enderror">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <p class="text-error text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sort Order -->
                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $category->sort_order ?? 0) }}"
                                   class="input focus:border-none input-primary w-full @error('sort_order') input-error @enderror"
                                   min="0">
                            @error('sort_order')
                                <p class="text-error text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Permissions -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>
                            <div class="border border-gray-300 rounded-lg p-4 max-h-64 overflow-y-auto">
                                @forelse($permissions as $permission)
                                    <label class="flex items-center space-x-2 py-1">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                               class="checkbox checkbox-sm checkbox-primary"
                                               {{ in_array($permission->id, old('permissions', $category->permissions->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        <span class="text-sm">{{ $permission->name }}</span>
                                    </label>
                                @empty
                                    <p class="text-gray-500 text-sm">No permissions available.</p>
                                @endforelse
                            </div>
                            @error('permissions')
                                <p class="text-error text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-4 mt-6">
                        <button type="submit" class="btn btn-primary btn-outline">Update Category</button>
                        <a href="{{ route('permission-categories.index') }}" class="btn btn-outline btn-neutral">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
