<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li>Customers</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Customer Management</h1>
            <div class="flex items-center gap-4">
                <form method="GET" action="{{ route('customers.index') }}" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm font-medium">Show:</label>
                    <select name="per_page" id="per_page" class="select select-bordered select-sm" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-500">entries</span>
                </form>
                @can('create-customers')
                    <a href="{{ route('customers.create') }}" class="btn btn-outline btn-primary">Add New Customer</a>
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
                                <th class="font-semibold">Name</th>
                                <th class="font-semibold">Email</th>
                                <th class="font-semibold">Company</th>
                                <th class="font-semibold">Phone</th>
                                <th class="font-semibold">Address</th>
                                <th class="font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers as $customer)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="customer_ids[]" value="{{ $customer->id }}" class="checkbox checkbox-sm customer-checkbox" form="bulkDeleteForm">
                                    </td>
                                    <td class="font-medium">{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->company ?? '-' }}</td>
                                    <td>{{ $customer->phone ?? '-' }}</td>
                                    <td>{{ $customer->address ?? '-' }}</td>
                                    <td>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('customers.edit', $customer) }}" class="tooltip tooltip-top btn btn-ghost btn-sm" data-tip="Detail & Edit">
                                                <x-heroicon-o-pencil-square class="h-4 w-4"/>
                                            </a>
                                            @can('delete-customers')
                                            <form method="POST" action="{{ route('customers.destroy', $customer) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="tooltip tooltip-top btn btn-ghost btn-sm text-red-600" data-tip="Delete" onclick="return confirm('Are you sure you want to delete this customer?')">
                                                    <x-heroicon-o-trash class="h-4 w-4"/>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-8 text-gray-500">No customers found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    {{ $customers->links('vendor.pagination.tailwind') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                @can('delete-customers')
                <form method="POST" action="{{ route('customers.bulk-delete') }}" id="bulkDeleteForm">
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
                        <p class="py-4">Are you sure you want to delete the selected customers? This action cannot be undone.</p>
                        <div class="modal-action">
                            <button type="button" class="btn" onclick="closeBulkDeleteModal()">Cancel</button>
                            <button type="button" class="btn btn-error" onclick="confirmBulkDelete()">Delete</button>
                        </div>
                    </div>
                </div>
                <script>
                    // Select all checkboxes
                    function toggleAll(source) {
                        const checkboxes = document.querySelectorAll('.customer-checkbox');
                        checkboxes.forEach(cb => cb.checked = source.checked);
                        updateBulkDeleteButton();
                    }

                    // Enable/disable bulk delete button
                    function updateBulkDeleteButton() {
                        const anyChecked = Array.from(document.querySelectorAll('.customer-checkbox')).some(c => c.checked);
                        document.getElementById('bulkDeleteBtn').disabled = !anyChecked;
                    }

                    // Attach event listeners to checkboxes only
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.customer-checkbox').forEach(cb => {
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
