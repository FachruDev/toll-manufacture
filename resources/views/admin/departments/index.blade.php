<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li>Departments</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Department Management</h1>
            <div class="flex items-center gap-4">
                <form method="GET" action="{{ route('departments.index') }}" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm font-medium">Show:</label>
                    <select name="per_page" id="per_page" class="select select-bordered select-sm" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-500">entries</span>
                </form>
                @can('create-departments')
                    <a href="{{ route('departments.create') }}" class="btn btn-outline btn-primary">Add New Department</a>
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
                                <th class="font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departments as $department)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="department_ids[]" value="{{ $department->id }}" class="checkbox checkbox-sm department-checkbox" form="bulkDeleteForm">
                                    </td>
                                    <td class="font-medium">{{ $department->name }}</td>
                                    <td>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('departments.edit', $department) }}" class="tooltip tooltip-top btn btn-ghost btn-sm" data-tip="Edit & Detail">
                                                <x-heroicon-o-pencil-square class="h-4 w-4"/>
                                            </a>
                                            @can('delete-departments')
                                            <form method="POST" action="{{ route('departments.destroy', $department) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="tooltip tooltip-top btn btn-ghost btn-sm text-red-600" data-tip="Delete" onclick="return confirm('Are you sure you want to delete this department?')">
                                                    <x-heroicon-o-trash class="h-4 w-4"/>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-8 text-gray-500">No departments found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-center py-4">
                                    {{ $departments->links('vendor.pagination.tailwind') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                @can('delete-departments')
                <form method="POST" action="{{ route('departments.bulk-delete') }}" id="bulkDeleteForm">
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
                        <p class="py-4">Are you sure you want to delete the selected departments? This action cannot be undone.</p>
                        <div class="modal-action">
                            <button type="button" class="btn" onclick="closeBulkDeleteModal()">Cancel</button>
                            <button type="button" class="btn btn-error" onclick="confirmBulkDelete()">Delete</button>
                        </div>
                    </div>
                </div>
                <script>
                    // Select all checkboxes
                    function toggleAll(source) {
                        const checkboxes = document.querySelectorAll('.department-checkbox');
                        checkboxes.forEach(cb => cb.checked = source.checked);
                        updateBulkDeleteButton();
                    }

                    // Enable/disable bulk delete button
                    function updateBulkDeleteButton() {
                        const anyChecked = Array.from(document.querySelectorAll('.department-checkbox')).some(c => c.checked);
                        document.getElementById('bulkDeleteBtn').disabled = !anyChecked;
                    }

                    // Attach event listeners to checkboxes only
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.department-checkbox').forEach(cb => {
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
