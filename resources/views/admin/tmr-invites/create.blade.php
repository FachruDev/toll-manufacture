<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('tmr-invites.index') }}">TMR Invites</a></li>
                <li>Create Invite</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Create New TMR Invite</h1>
            <a href="{{ route('tmr-invites.index') }}" class="btn btn-outline btn-neutral">Back to TMR Invites</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('tmr-invites.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full input input-primary focus:border-none" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Expires in Days</label>
                            <input type="number" name="expires_in_days" value="{{ old('expires_in_days', 7) }}" class="w-full input input-primary focus:border-none" min="1" max="365">
                            @error('expires_in_days')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Leave empty for default 7 days</p>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn btn-outline btn-primary">Create Invite</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
