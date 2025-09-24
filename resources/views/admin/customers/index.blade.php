<x-layouts.dashboard>
    <div class="p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li>Customers</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Customer Management</h1>
            <a href="{{ route('customers.create') }}" class="btn btn-primary">Add New Customer</a>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone ?? '-' }}</td>
                                    <td>{{ $customer->company ?? '-' }}</td>
                                    <td>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('customers.edit', $customer) }}" class="tooltip tooltip-top btn btn-sm btn-ghost" data-tip="Edit Customer">
                                                <x-heroicon-o-pencil-square class="h-4 w-4"/>
                                            </a>
                                            <form method="POST" action="{{ route('customers.destroy', $customer) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="tooltip tooltip-top btn btn-sm btn-ghost text-error" data-tip="Delete Customer" onclick="return confirm('Are you sure?')">
                                                    <x-heroicon-o-trash class="h-4 w-4"/>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No customers found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
