<x-layouts.dashboard>
    <div class="p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('customers.index') }}">Customers</a></li>
                <li>Edit Customer</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Edit Customer: {{ $customer->name }}</h1>
            <a href="{{ route('customers.index') }}" class="btn btn-ghost">Back to Customers</a>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <form method="POST" action="{{ route('customers.update', $customer) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Name *</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="input input-bordered" required>
                            @error('name')
                                <span class="text-error text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email *</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="input input-bordered" required>
                            @error('email')
                                <span class="text-error text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Phone</span>
                            </label>
                            <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" class="input input-bordered">
                            @error('phone')
                                <span class="text-error text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Company</span>
                            </label>
                            <input type="text" name="company" value="{{ old('company', $customer->company) }}" class="input input-bordered">
                            @error('company')
                                <span class="text-error text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password (leave blank to keep current)</span>
                            </label>
                            <input type="password" name="password" class="input input-bordered">
                            @error('password')
                                <span class="text-error text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Confirm Password</span>
                            </label>
                            <input type="password" name="password_confirmation" class="input input-bordered">
                        </div>
                    </div>

                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Update Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
