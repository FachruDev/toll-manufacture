<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('customers.index') }}">Customers</a></li>
                <li>Edit Customer</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Edit Customer: {{ $customer->name }}</h1>
            <a href="{{ route('customers.index') }}" class="btn btn-outline btn-neutral">Back to Customers</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('customers.update', $customer) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                            <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="w-full input input-primary focus:border-none" required @cannot('edit-customers') readonly @endcannot>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full input input-primary focus:border-none" required @cannot('edit-customers') readonly @endcannot>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" class="w-full input input-primary focus:border-none" @cannot('edit-customers') readonly @endcannot>
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                            <input type="text" name="company" value="{{ old('company', $customer->company) }}" class="w-full input input-primary focus:border-none" @cannot('edit-customers') readonly @endcannot>
                            @error('company')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <textarea name="address" class="w-full textarea textarea-primary focus:border-none" rows="3" @cannot('edit-customers') readonly @endcannot>{{ old('address', $customer->address) }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    @can('edit-customers')
                        <div class="flex justify-end mt-6">
                            <button type="submit" class="btn btn-outline btn-primary">Update Customer</button>
                        </div>
                    @endcan
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
