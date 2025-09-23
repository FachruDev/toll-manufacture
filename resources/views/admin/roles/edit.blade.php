<x-layouts.dashboard>
    @if(session('success'))
    <div class="toast toast-top toast-end z-50">
        <div class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="toast toast-top toast-end z-50">
        <div class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    </div>
    @endif

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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                                <input type="text" name="name" value="{{ old('name', $role->name) }}" class="w-full input input-primary focus:border-none" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Permissions Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-6">Permissions</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($permissions as $permission)
                                <label class="flex items-center cursor-pointer">
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
