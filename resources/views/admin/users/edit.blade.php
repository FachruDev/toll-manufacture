<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('users.index') }}">Users</a></li>
                <li>Edit User</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Edit User: {{ $user->name }}</h1>
            <a href="{{ route('users.index') }}" class="btn btn-outline btn-neutral">Back to Users</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- User Information Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-6 text-primary">User Information</h2>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
                            <input type="file" name="image" class="w-full mb-5 file-input file-input-primary" accept="image/*" @cannot('edit-users') readonly @endcannot>
                            @if($user->image_path)
                                <p class="text-sm mt-1">Current: <a href="{{ asset('storage/' . $user->image_path) }}" target="_blank">View Image</a></p>
                            @endif
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full input input-primary focus:border-none" required @cannot('edit-users') readonly @endcannot>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full input input-primary focus:border-none" required @cannot('edit-users') readonly @endcannot>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Employee ID</label>
                            <input type="text" name="employee_id" value="{{ old('employee_id', $user->employee_id) }}" class="w-full input input-primary focus:border-none" @cannot('edit-users') readonly @endcannot>
                            @error('employee_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full input input-primary focus:border-none" @cannot('edit-users') readonly @endcannot>
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                            <select name="department_id" class="w-full select select-primary">
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }} @cannot('edit-users') readonly @endcannot>{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 my-8"></div>

                    <!-- Account Security Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold mb-6">Account Security</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">


                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password (leave blank to keep current)</label>
                                <input type="password" name="password" class="w-full input input-primary focus:border-none" @cannot('edit-users') readonly @endcannot>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="w-full input input-primary focus:border-none" @cannot('edit-users') readonly @endcannot>
                            </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Roles *</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                @foreach($roles as $roleId => $roleName)
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="checkbox" name="roles[]" value="{{ $roleName }}" class="checkbox checkbox-primary" {{ $user->hasRole($roleName) || in_array($roleName, old('roles', [])) ? 'checked' : '' }}>
                                        <span class="text-sm font-medium text-gray-700">{{ ucfirst($roleName) }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('roles')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @can('edit-users')
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-outline btn-primary">Update User</button>
                    </div>
                    @endcan
                </form>
            </div>
        </div>

        @if(!$user->hasVerifiedEmail())
        @can('send-verifications-users')
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mt-6">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Email Verification</h3>
                <p class="text-sm text-gray-600 mb-4">This user has not verified their email address yet. You can send a verification email to them.</p>
                <form method="POST" action="{{ route('users.send-verification', $user) }}">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-primary">Send Verification Email</button>
                </form>
            </div>
        </div>
        @endcan
        @endif
    </div>
</x-layouts.dashboard>
