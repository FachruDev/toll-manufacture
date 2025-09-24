<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('roles.index') }}">Roles</a></li>
                <li>Edit Role</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Edit Role: {{ $role->name }}</h1>
            <a href="{{ route('roles.index') }}" class="btn btn-outline btn-neutral">Back to Roles</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('roles.update', $role) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Role Information Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-6">Role Information</h2>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                            <input type="text" name="name" value="{{ old('name', $role->name) }}" class="w-full input input-primary focus:border-none" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Permissions Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-6">Permissions</h2>
                        <div class="mb-4">
                            <input type="text" id="permission-search" class="input input-primary w-full focus:border-none" placeholder="Search permissions..." autocomplete="off" list="permissions-datalist">
                            <datalist id="permissions-datalist">
                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->name }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div id="permissions-list" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($permissions as $permission)
                                <label class="flex items-center cursor-pointer permission-item" data-name="{{ strtolower($permission->name) }}">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="checkbox checkbox-primary mr-3" {{ $role->hasPermissionTo($permission->name) || in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                                    <span class="text-sm font-medium text-gray-700">{{ $permission->name }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('permissions')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-outline btn-primary">Update Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>

<script>
document.getElementById('permission-search').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const items = document.querySelectorAll('.permission-item');
    items.forEach(item => {
        const name = item.getAttribute('data-name');
        if (name.includes(searchTerm)) {
            item.style.display = 'flex';
        } else {
            item.style.display = 'none';
        }
    });
});
</script>
