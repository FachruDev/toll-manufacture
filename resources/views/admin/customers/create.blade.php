<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('customers.index') }}">Customers</a></li>
                <li>Create Customer</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Create New Customer</h1>
            <a href="{{ route('customers.index') }}" class="btn btn-outline btn-neutral">Back to Customers</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full input input-primary focus:border-none" required>
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
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full input input-primary focus:border-none">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                            <input type="text" name="company" value="{{ old('company') }}" class="w-full input input-primary focus:border-none">
                            @error('company')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <textarea name="address" class="w-full textarea textarea-primary focus:border-none" rows="3">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-outline btn-primary">Create Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
