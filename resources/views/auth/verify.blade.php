@php($title = 'Verifikasi Email')
<x-layouts.app :title="$title">
    <div class="max-w-xl mx-auto mt-10">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title text-blue-700">Verifikasi Email</h2>
                <p class="mb-4">Kami telah mengirimkan link verifikasi ke email Anda. Jika belum menerima, klik tombol di bawah untuk kirim ulang.</p>

                <form method="POST" action="{{ route('verification.send') }}" class="inline">
                    @csrf
                    <button class="btn btn-primary" type="submit">Kirim Ulang</button>
                </form>

                <a href="{{ route('logout') }}" class="btn btn-ghost ml-2">Keluar</a>

                @if (session('status'))
                    <div class="alert alert-success mt-4"><span>{{ session('status') }}</span></div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
