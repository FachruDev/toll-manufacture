<x-layouts.dashboard>
    <div class="max-w mx-auto p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li><a href="{{ route('tmr-invites.index') }}">TMR Invites</a></li>
                <li>Invite Details</li>
            </ul>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">TMR Invite Details</h1>
            <a href="{{ route('tmr-invites.index') }}" class="btn btn-outline btn-neutral">Back to TMR Invites</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Invite Information -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-6 text-primary">Invite Information</h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $invite->email }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Token</label>
                            <p class="mt-1 text-sm text-gray-900 font-mono">{{ $invite->token }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Expires At</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $invite->expires_at->format('M d, Y H:i') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <p class="mt-1">
                                @if($invite->used_at)
                                    <span class="badge badge-success">Used</span>
                                @elseif($invite->expires_at->isPast())
                                    <span class="badge badge-error">Expired</span>
                                @else
                                    <span class="badge badge-warning">Active</span>
                                @endif
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Created By</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $invite->creator->name ?? 'Unknown' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Created At</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $invite->created_at->format('M d, Y H:i') }}</p>
                        </div>

                        @if($invite->used_at)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Used At</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $invite->used_at->format('M d, Y H:i') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Public Link -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-6 text-primary">Public Link</h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Invite URL</label>
                            <div class="flex">
                                <input type="text" value="{{ url('/tmr/invite/'.$invite->token) }}" class="flex-1 input input-primary focus:border-none" readonly id="inviteUrl">
                                <button type="button" onclick="copyToClipboard()" class="btn btn-outline btn-primary ml-2">Copy</button>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <x-heroicon-o-information-circle class="h-5 w-5"/>
                            <div>
                                <p class="text-sm">Share this link with the customer to allow them to submit their TMR request.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function copyToClipboard() {
                const urlInput = document.getElementById('inviteUrl');
                urlInput.select();
                urlInput.setSelectionRange(0, 99999); // For mobile devices

                try {
                    document.execCommand('copy');
                    // You could add a toast notification here
                    alert('URL copied to clipboard!');
                } catch (err) {
                    console.error('Failed to copy: ', err);
                }
            }
        </script>
    </div>
</x-layouts.dashboard>
