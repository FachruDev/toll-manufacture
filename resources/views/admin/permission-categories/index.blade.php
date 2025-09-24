<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li>Permission Categories</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Permission Categories</h1>
            <div class="flex items-center gap-4">
                <form method="GET" action="{{ route('permission-categories.index') }}" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm font-medium">Show:</label>
                    <select name="per_page" id="per_page" class="select select-bordered select-sm" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-500">entries</span>
                </form>
                @can('create-permission-categories')
                    <a href="{{ route('permission-categories.create') }}" class="btn btn-outline btn-primary">Add Category</a>
                @endcan
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr>
                                <th class="font-semibold">
                                    <input type="checkbox" id="selectAll" class="checkbox checkbox-sm" onclick="toggleAll(this)">
                                </th>
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
                                    <td>
                                        <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" class="checkbox checkbox-sm category-checkbox" form="bulkDeleteForm">
                                    </td>
                                    <td class="font-medium">{{ $category->name }}</td>
                                    <td>{{ Str::limit($category->description ?? '-', 30) }}</td>
                                    <td>
                                        <span class="badge badge-primary">{{ $category->permissions_count }}</span>
                                    </td>
                                    <td>{{ $category->sort_order ?? 0 }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('permission-categories.edit', $category) }}" class="btn btn-sm btn-ghost tooltip tooltip-top" data-tip="Edit & Detail">
                                                <x-heroicon-o-pencil-square class="h-4 w-4"/>
                                            </a>
                                            @can('delete-permission-categories')
                                            <form method="POST" action="{{ route('permission-categories.destroy', $category) }}" class="inline" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-ghost text-error tooltip tooltip-top" data-tip="Delete">
                                                    <x-heroicon-o-trash class="h-4 w-4"/>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-500">No permission categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    {{ $categories->links() }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                @can('delete-permission-categories')
                <form method="POST" action="{{ route('permission-categories.bulk-delete') }}" id="bulkDeleteForm">
                    @csrf
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-4 gap-2">
                        <button type="button" class="btn btn-error btn-outline btn-sm w-max" onclick="openBulkDeleteModal()" id="bulkDeleteBtn" disabled>Bulk Delete</button>
                    </div>
                </form>
                @endcan

                <!-- Bulk Delete Confirmation Modal -->
                <div id="bulkDeleteModal" class="modal">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">Confirm Bulk Delete</h3>
                        <p class="py-4">Are you sure you want to delete the selected categories? This action cannot be undone.</p>
                        <div class="modal-action">
                            <button type="button" class="btn" onclick="closeBulkDeleteModal()">Cancel</button>
                            <button type="button" class="btn btn-error" onclick="confirmBulkDelete()">Delete</button>
                        </div>
                    </div>
                </div>

                @if($categories->hasPages())
                    <div class="mt-4">
                        {{ $categories->links('vendor.pagination.tailwind') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Select all checkboxes
        function toggleAll(source) {
            const checkboxes = document.querySelectorAll('.category-checkbox');
            checkboxes.forEach(cb => cb.checked = source.checked);
            updateBulkDeleteButton();
        }

        // Enable/disable bulk delete button
        function updateBulkDeleteButton() {
            const anyChecked = Array.from(document.querySelectorAll('.category-checkbox')).some(c => c.checked);
            document.getElementById('bulkDeleteBtn').disabled = !anyChecked;
        }

        // Attach event listeners to checkboxes only
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.category-checkbox').forEach(cb => {
                cb.addEventListener('change', updateBulkDeleteButton);
            });
        });

        // Modal functions
        function openBulkDeleteModal() {
            document.getElementById('bulkDeleteModal').classList.add('modal-open');
        }

        function closeBulkDeleteModal() {
            document.getElementById('bulkDeleteModal').classList.remove('modal-open');
        }

        function confirmBulkDelete() {
            document.getElementById('bulkDeleteForm').submit();
        }
    </script>
</x-layouts.dashboard>
