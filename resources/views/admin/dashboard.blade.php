<x-layouts.dashboard>
    <div class="p-4">
        @if(! auth()->user()->hasVerifiedEmail())
            <div class="alert alert-warning mb-4">
                <span>Email Anda belum terverifikasi</span>
                <div>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button class="btn btn-sm btn-primary">Kirim Ulang Link</button>
                    </form>
                </div>
            </div>
        @endif

        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Admin</li>
            </ul>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="stat bg-blue-600 text-white rounded-box">
                <div class="stat-title text-white">Users</div>
                <div class="stat-value">{{ \App\Models\User::count() }}</div>
            </div>
            <div class="stat bg-blue-500 text-white rounded-box">
                <div class="stat-title text-white">Roles</div>
                <div class="stat-value">{{ Spatie\Permission\Models\Role::count() }}</div>
            </div>
            <div class="stat bg-blue-400 text-white rounded-box">
                <div class="stat-title text-white">Permissions</div>
                <div class="stat-value">{{ Spatie\Permission\Models\Permission::count() }}</div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
