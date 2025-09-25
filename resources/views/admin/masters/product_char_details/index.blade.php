<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="#">Masters</a></li>
                <li>Product Char Details</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Product Char Detail Management</h1>
            <div class="flex items-center gap-4">
                <form method="GET" action="{{ route('product-char-details.index') }}" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm font-medium">Show:</label>
                    <select name="per_page" id="per_page" class="select select-bordered select-sm" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-500">entries</span>
                </form>
                @can('create-product-char-details')
                <a href="{{ route('product-char-details.create') }}" class="btn btn-outline btn-primary">Add New Product Char Detail</a>
                @endcan
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="p-6">
                <div>
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr>
                                <th class="font-semibold">
                                    <input type="checkbox" id="selectAll" class="checkbox checkbox-sm" onclick="toggleAll(this)">
                                </th>
                                <th class="font-semibold">Group</th>
                                <th class="font-semibold">Field Title</th>
                                <th class="font-semibold">Input Type</th>
                                <th class="font-semibold">Required</th>
                                <th class="font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="item_ids[]" value="{{ $item->id }}" class="checkbox checkbox-sm item-checkbox" form="bulkDeleteForm">
                                    </td>
                                    <td class="font-medium">{{ $item->group->title ?? 'N/A' }}</td>
                                    <td class="font-medium">{{ $item->field_title }}</td>
                                    <td>
                                        <span class="badge badge-outline">{{ $item->input_type ?? 'text' }}</span>
                                    </td>
                                    <td>
                                        @if($item->is_required)
                                            <span class="badge badge-success badge-outline">Yes</span>
                                        @else
                                            <span class="badge badge-error badge-outline">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex space-x-2">
                                            @can('edit-product-char-details')
                                            <a href="{{ route('product-char-details.edit', $item) }}" class="tooltip tooltip-top btn btn-ghost btn-sm" data-tip="Edit Product Char Detail">
                                                <x-heroicon-o-pencil-square class="h-4 w-4"/>
                                            </a>
                                            @endcan
                                            @can('delete-product-char-details')
                                            <form method="POST" action="{{ route('product-char-details.destroy', $item) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="tooltip tooltip-top btn btn-ghost btn-sm text-red-600" data-tip="Delete Product Char Detail" onclick="return confirm('Are you sure you want to delete this product char detail?')">
                                                    <x-heroicon-o-trash class="h-4 w-4"/>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-500">No product char details found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    {{ $items->links('vendor.pagination.tailwind') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                @can('delete-product-char-details')
                <form method="POST" action="{{ route('product-char-details.bulk-delete') }}" id="bulkDeleteForm">
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
                        <p class="py-4">Are you sure you want to delete the selected product char details? This action cannot be undone.</p>
                        <div class="modal-action">
                            <button type="button" class="btn" onclick="closeBulkDeleteModal()">Cancel</button>
                            <button type="button" class="btn btn-error" onclick="confirmBulkDelete()">Delete</button>
                        </div>
                    </div>
                </div>
                <script>
                    // Select all checkboxes
                    function toggleAll(source) {
                        const checkboxes = document.querySelectorAll('.item-checkbox');
                        checkboxes.forEach(cb => cb.checked = source.checked);
                        updateBulkDeleteButton();
                    }

                    // Enable/disable bulk delete button
                    function updateBulkDeleteButton() {
                        const anyChecked = Array.from(document.querySelectorAll('.item-checkbox')).some(c => c.checked);
                        document.getElementById('bulkDeleteBtn').disabled = !anyChecked;
                    }

                    // Attach event listeners to checkboxes only
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.item-checkbox').forEach(cb => {
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
            </div>
        </div>
    </div>
</x-layouts.dashboard>
