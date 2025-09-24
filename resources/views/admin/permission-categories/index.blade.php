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
                <li>Permission Categories</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-primary">Permission Categories</h1>
            <a href="{{ route('permission-categories.create') }}" class="btn btn-outline btn-primary">Add Category</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr>
                                <th class="font-semibold">Name</th>
                                <th class="font-semibold">Description</th>
                                <th class="font-semibold">Permissions Count</th>
                                <th class="font-semibold">Sort Order</th>
                                <th class="font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td class="font-medium">{{ $category->name }}</td>
                                    <td>{{ $category->description ?? '-' }}</td>
                                    <td>
                                        <span class="badge badge-primary">{{ $category->permissions_count }}</span>
                                    </td>
                                    <td>{{ $category->sort_order ?? 0 }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('permission-categories.edit', $category) }}" class="btn btn-sm btn-ghost">
                                                <x-heroicon-o-pencil-square class="h-4 w-4"/>
                                            </a>
                                            <form method="POST" action="{{ route('permission-categories.destroy', $category) }}" class="inline" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-ghost text-error">
                                                    <x-heroicon-o-trash class="h-4 w-4"/>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-8 text-gray-500">No permission categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($categories->hasPages())
                    <div class="mt-4">
                        {{ $categories->links('vendor.pagination.tailwind') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.dashboard>
