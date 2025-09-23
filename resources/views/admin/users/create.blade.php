<x-layouts.dashboard>
    @if(session('success'))
    <div class="toast toast-top toast-end z-50">
        <div class="alert alert-success">
            <x-heroicon-o-check-badge class="h-6 w-6"/>
            <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="toast toast-top toast-end z-50">
        <div class="alert alert-error">
            <x-heroicon-s-exclamation-triangle class="h-6 w-6"/>
            <span>{{ session('error') }}</span>
        </div>
    </div>
    @endif

    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('users.index') }}">Users</a></li>
                <li>Create User</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Create New User</h1>
            <a href="{{ route('users.index') }}" class="btn btn-outline btn-neutral">Back to Users</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- User Information Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-6 text-primary">User Information</h2>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
                            <input type="file" name="image" class="w-full file-input file-input-primary" accept="image/*">
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full input input-primary focus:border-none"    required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full input input-primary focus:border-none" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Employee ID</label>
                            <input type="text" name="employee_id" value="{{ old('employee_id') }}" class="w-full input input-primary focus:border-none">
                            @error('employee_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full input input-primary focus:border-none">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                            <select name="department_id" class="w-full select select-primary">
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 my-8"></div>

                    <!-- Account Security Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-6">Account Security</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password *</label>
                                <input type="password" name="password" class="w-full input input-primary focus:border-none" required>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password *</label>
                                <input type="password" name="password_confirmation" class="w-full input input-primary focus:border-none" required>
                            </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Roles *</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                @foreach($roles as $roleId => $roleName)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="roles[]" value="{{ $roleName }}" class="checkbox checkbox-primary" {{ in_array($roleName, old('roles', [])) ? 'checked' : '' }}>
                                        <span class="ml-2 text-sm text-gray-700">{{ ucfirst($roleName) }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('roles')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-outline btn-primary">
                            Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
