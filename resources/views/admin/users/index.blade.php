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
                <li>Users</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">User Management</h1>
            <div class="flex items-center gap-4">
                <form method="GET" action="{{ route('users.index') }}" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm font-medium">Show:</label>
                    <select name="per_page" id="per_page" class="select select-bordered select-sm" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-500">entries</span>
                </form>
                <a href="{{ route('users.create') }}" class="btn btn-outline btn-primary">Add New User</a>
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
                                <th class="font-semibold">Phone</th>
                                <th class="font-semibold">Department</th>
                                <th class="font-semibold">Roles</th>
                                <th class="font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="checkbox checkbox-sm user-checkbox" form="bulkDeleteForm">
                                    </td>
                                    <td class="font-medium">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone ?? '-' }}</td>
                                    <td>{{ $user->department->name ?? '-' }}</td>
                                    <td>
                                        <div class="flex flex-wrap gap-1">
                                            <span class="badge badge-outline badge-primary">{{ $user->roles->count() }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('users.edit', $user) }}" class="tooltip tooltip-top text-warning hover:text-yellow-600 transition duration-200" data-tip="Edit User">
                                                <x-heroicon-o-pencil-square class="w-6 h-6" />
                                            </a>

                                            @if(!$user->hasVerifiedEmail())
                                                <form method="POST" action="{{ route('users.send-verification', $user) }}" class="inline">
                                                    @csrf
                                                    <button type="submit" class="tooltip tooltip-top text-primary hover:text-blue-700 transition duration-200 cursor-pointer" data-tip="Send Verification Email">
                                                        <x-heroicon-s-paper-airplane class="w-6 h-6"/>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-8 text-gray-500">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    {{ $users->links('vendor.pagination.tailwind') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <form method="POST" action="{{ route('users.bulk-delete') }}" id="bulkDeleteForm">
                    @csrf
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-4 gap-2">
                        <button type="button" class="btn btn-error btn-outline btn-sm w-max" onclick="openBulkDeleteModal()" id="bulkDeleteBtn" disabled>Bulk Delete</button>
                    </div>
                </form>

                <!-- Bulk Delete Confirmation Modal -->
                <div id="bulkDeleteModal" class="modal">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">Confirm Bulk Delete</h3>
                        <p class="py-4">Are you sure you want to delete the selected users? This action cannot be undone.</p>
                        <div class="modal-action">
                            <button type="button" class="btn" onclick="closeBulkDeleteModal()">Cancel</button>
                            <button type="button" class="btn btn-error" onclick="confirmBulkDelete()">Delete</button>
                        </div>
                    </div>
                </div>
                <script>
                    // Select all checkboxes
                    function toggleAll(source) {
                        const checkboxes = document.querySelectorAll('.user-checkbox');
                        checkboxes.forEach(cb => cb.checked = source.checked);
                        updateBulkDeleteButton();
                    }

                    // Enable/disable bulk delete button
                    function updateBulkDeleteButton() {
                        const anyChecked = Array.from(document.querySelectorAll('.user-checkbox')).some(c => c.checked);
                        document.getElementById('bulkDeleteBtn').disabled = !anyChecked;
                    }

                    // Attach event listeners to checkboxes only
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.user-checkbox').forEach(cb => {
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
