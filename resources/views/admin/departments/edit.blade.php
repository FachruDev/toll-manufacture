<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('departments.index') }}">Departments</a></li>
                <li>Edit Department</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Edit Department: {{ $department->name }}</h1>
            <a href="{{ route('departments.index') }}" class="btn btn-outline btn-neutral">Back to Departments</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <form method="POST" action="{{ route('departments.update', $department) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                        <input type="text" name="name" value="{{ old('name', $department->name) }}" class="w-full input input-primary focus:border-none" required @cannot('edit-departments') readonly @endcannot>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    @can('edit-departments')
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-outline btn-primary">Update Department</button>
                    </div>
                    @endcan
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
