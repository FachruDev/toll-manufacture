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

    <div class="max-w mx-auto p-6"> <!-- HARAM DI UBAH -->
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">

                <!-- Profile Information Section -->
                <div class="mb-12">
                    <h2 class="text-2xl font-semibold mb-6">Profile Information</h2>

                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Profile Image -->
                        <div class="flex items-center space-x-4">
                            @if($user->image_path)
                                <img src="{{ asset('storage/'.$user->image_path) }}" alt="Profile Image" class="w-20 h-20 rounded-full object-cover">
                            @else
                                <div class="w-20 h-20 rounded-full bg-base-200 flex items-center justify-center">
                                    <span class="text-base-content/50 text-2xl">?</span>
                                </div>
                            @endif
                            <div>
                                <label class="label">
                                    <span class="label-text">Profile Picture</span>
                                </label>
                                <input type="file" name="image" accept="image/*" class="file-input file-input-bordered w-full max-w-xs">
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="flex flex-col md:flex-row md:flex-wrap gap-6">
                            <div class="form-control flex-1 min-w-0">
                                <label class="label">
                                    <span class="label-text">Full Name</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input focus:outline-none" required>
                                @error('name')
                                    <span class="text-error text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control flex-1 min-w-0">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input focus:outline-none" required>
                                @error('email')
                                    <span class="text-error text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control flex-1 min-w-0">
                                <label class="label">
                                    <span class="label-text">Employee ID</span>
                                </label>
                                <input type="text" name="employee_id" value="{{ old('employee_id', $user->employee_id) }}" class="input focus:outline-none">
                                @error('employee_id')
                                    <span class="text-error text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control flex-1 min-w-0">
                                <label class="label">
                                    <span class="label-text">Phone Number</span>
                                </label>
                                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="input focus:outline-none">
                                @error('phone')
                                    <span class="text-error text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Department</span>
                                </label>
                                <select name="department_id" class="select w-full focus:outline-none">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $d)
                                        <option value="{{ $d->id }}" {{ (string)old('department_id', (string)($user->department_id ?? '')) === (string)$d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="text-error text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Section -->
                <div>
                    <h2 class="text-2xl font-semibold mb-6">Change Password</h2>

                    <form method="POST" action="{{ route('admin.profile.password') }}" class="space-y-6">
                        @csrf

                        <div class="flex flex-col md:flex-row md:flex-wrap gap-6">
                            <div class="form-control flex-1 min-w-0">
                                <label class="label">
                                    <span class="label-text">Current Password</span>
                                </label>
                                <input type="password" name="current_password" class="input focus:outline-none" required>
                                @error('current_password')
                                    <span class="text-error text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control flex-1 min-w-0">
                                <label class="label">
                                    <span class="label-text">New Password</span>
                                </label>
                                <input type="password" name="password" class="input focus:outline-none" required>
                                @error('password')
                                    <span class="text-error text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-control flex-1 min-w-0">
                                <label class="label">
                                    <span class="label-text">Confirm New Password</span>
                                </label>
                                <input type="password" name="password_confirmation" class="input focus:outline-none" required>
                                @error('password_confirmation')
                                    <span class="text-error text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-actions justify-end">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
