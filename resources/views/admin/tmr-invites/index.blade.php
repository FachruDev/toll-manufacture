<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li>TMR Invites</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">TMR Invites Management</h1>
            <div class="flex items-center gap-4">
                <form method="GET" action="{{ route('tmr-invites.index') }}" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm font-medium">Show:</label>
                    <select name="per_page" id="per_page" class="select select-bordered select-sm" onchange="this.form.submit()">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-500">entries</span>
                </form>
                @can('create-invite-tmr')
                <a href="{{ route('tmr-invites.create') }}" class="btn btn-outline btn-primary">Create New Invite</a>
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
                                <th class="font-semibold">Email</th>
                                <th class="font-semibold">Expires At</th>
                                <th class="font-semibold">Status</th>
                                <th class="font-semibold">Created By</th>
                                <th class="font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($invites as $invite)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="invite_ids[]" value="{{ $invite->id }}" class="checkbox checkbox-sm invite-checkbox" form="bulkDeleteForm">
                                    </td>
                                    <td class="font-medium">{{ $invite->email }}</td>
                                    <td>{{ $invite->expires_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        @if($invite->used_at)
                                            <span class="badge badge-success">Used</span>
                                        @elseif($invite->expires_at->isPast())
                                            <span class="badge badge-error">Expired</span>
                                        @else
                                            <span class="badge badge-warning">Active</span>
                                        @endif
                                    </td>
                                    <td>{{ $invite->creator->name ?? 'Unknown' }}</td>
                                    <td>
                                        <div class="flex space-x-2">
                                            @can('view-invite-tmr')
                                            <a href="{{ route('tmr-invites.show', $invite) }}" class="tooltip tooltip-top btn btn-ghost btn-sm" data-tip="View Details">
                                                <x-heroicon-o-eye class="h-4 w-4"/>
                                            </a>
                                            @endcan
                                            @can('delete-invite-tmr')
                                            <form method="POST" action="{{ route('tmr-invites.destroy', $invite) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="tooltip tooltip-top btn btn-ghost btn-sm text-red-600" data-tip="Delete Invite" onclick="return confirm('Are you sure you want to delete this invite?')">
                                                    <x-heroicon-o-trash class="h-4 w-4"/>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-500">No TMR invites found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    {{ $invites->links('vendor.pagination.tailwind') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                @can('delete-invite-tmr')
                <form method="POST" action="{{ route('tmr-invites.bulk-delete') }}" id="bulkDeleteForm">
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
                        <p class="py-4">Are you sure you want to delete the selected TMR invites? This action cannot be undone.</p>
                        <div class="modal-action">
                            <button type="button" class="btn" onclick="closeBulkDeleteModal()">Cancel</button>
                            <button type="button" class="btn btn-error" onclick="confirmBulkDelete()">Delete</button>
                        </div>
                    </div>
                </div>
                <script>
                    // Select all checkboxes
                    function toggleAll(source) {
                        const checkboxes = document.querySelectorAll('.invite-checkbox');
                        checkboxes.forEach(cb => cb.checked = source.checked);
                        updateBulkDeleteButton();
                    }

                    // Enable/disable bulk delete button
                    function updateBulkDeleteButton() {
                        const anyChecked = Array.from(document.querySelectorAll('.invite-checkbox')).some(c => c.checked);
                        document.getElementById('bulkDeleteBtn').disabled = !anyChecked;
                    }

                    // Attach event listeners to checkboxes only
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.invite-checkbox').forEach(cb => {
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
