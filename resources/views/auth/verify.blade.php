@php($title = 'Verifikasi Email')
<x-layouts.app :title="$title">
    <div class="max-w-xl mx-auto mt-10">
        <x-card shadow>
            <x-slot:title>
                <span class="text-blue-700">Verifikasi Email</span>
            </x-slot:title>
            <p class="mb-4">Kami telah mengirimkan link verifikasi ke email Anda. Jika belum menerima, klik tombol di bawah untuk kirim ulang.</p>

            <form method="POST" action="{{ route('verification.send') }}" class="inline">
                @csrf
                <x-button class="btn-primary bg-blue-600 border-blue-600" type="submit">Kirim Ulang</x-button>
            </form>

            <a href="{{ route('logout') }}" class="btn btn-ghost ml-2">Keluar</a>

            @if (session('status'))
                <x-alert class="mt-4" title="{{ session('status') }}" icon="o-check-circle" />
            @endif
        </x-card>
    </div>
</x-layouts.app>

