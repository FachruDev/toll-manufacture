<x-layouts.dashboard>
    @if (session('success'))
        <div class="fixed top-4 right-4 z-50">
            <div
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md shadow-md flex items-center space-x-2">
                <x-heroicon-o-check-badge class="h-6 w-6" />
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="max-w mx-auto p-4">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">

                <!-- Profile Information Section -->
                <div class="mb-12">
                    <h2 class="text-xl font-semibold mb-6 text-primary">Profile Information</h2>

                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Profile Image -->
                        <div class=" items-center space-x-4 mb-6">
                            @if ($user->image_path)
                                <img src="{{ asset('storage/' . $user->image_path) }}" alt="Profile Image"
                                    class="w-20 h-20 rounded-full object-cover border-2 border-gray-200">
                            @else
                                <div
                                    class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center border-2 border-gray-200">
                                    <span class="text-gray-400 text-2xl">?</span>
                                </div>
                            @endif
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
                                <input type="file" name="image" accept="image/*"
                                    class="w-full file-input file-input-primary">
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    class="w-full input input-primary focus:border-none" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="w-full input input-primary focus:border-none" required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Employee ID</label>
                                <input type="text" name="employee_id"
                                    value="{{ old('employee_id', $user->employee_id) }}"
                                    class="w-full input input-primary focus:border-none">
                                @error('employee_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                                    class="w-full input input-primary focus:border-none">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                                <select name="department_id" class="w-full select select-primary focus:border-none">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $d)
                                        <option value="{{ $d->id }}"
                                            {{ (string) old('department_id', (string) ($user->department_id ?? '')) === (string) $d->id ? 'selected' : '' }}>
                                            {{ $d->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="btn btn-outline btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-200 my-8"></div>

                <!-- Change Password Section -->
                <div>
                    <h2 class="text-xl font-semibold mb-6 text-primary">Change Password</h2>

                    <form method="POST" action="{{ route('admin.profile.password') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Password *</label>
                                <input type="password" name="current_password"
                                    class="w-full input input-primary focus:border-none" required>
                                @error('current_password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">New Password *</label>
                                <input type="password" name="password"
                                    class="w-full input input-primary focus:border-none" required>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password
                                    *</label>
                                <input type="password" name="password_confirmation"
                                    class="w-full input input-primary focus:border-none" required>
                                @error('password_confirmation')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="btn btn-outline btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
