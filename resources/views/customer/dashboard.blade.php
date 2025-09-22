<x-layouts.dashboard>
    <div class="p-4">
        <div class="breadcrumbs text-sm mb-3">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Customer</li>
            </ul>
        </div>

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Welcome, {{ auth()->user()->name }}</h2>
                <p class="text-sm text-gray-600">Panel customer sederhana. Nantinya form TMR dan status akan tampil di sini.</p>
                <div class="mt-4">
                    <button class="btn btn-primary">Action Placeholder</button>
                </div>
            </div>
        </div>

        @if(! auth()->user()->hasVerifiedEmail())
            <div class="alert alert-warning mt-4">
                <span>Email belum terverifikasi. Akses fitur lain akan dibatasi.</span>
                <div>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button class="btn btn-sm btn-primary">Kirim Ulang Link</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</x-layouts.dashboard>
