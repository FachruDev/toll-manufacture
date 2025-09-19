@php($title = 'Customer Dashboard')
<x-layouts.dashboard :title="$title">
    <div class="p-4">
        <x-breadcrumbs :items="[['label'=>'Home','url'=>route('home')],['label'=>'Customer']]" />

        <x-card shadow>
            <x-slot:title>
                <span class="text-blue-700">Welcome, {{ auth()->user()->name }}</span>
            </x-slot:title>
            <p class="text-sm text-gray-600">Panel customer sederhana. Nantinya form TMR dan status akan tampil di sini.</p>
            <div class="mt-4">
                <x-button class="btn-primary bg-blue-600 border-blue-600">Action Placeholder</x-button>
            </div>
        </x-card>

        @if(! auth()->user()->hasVerifiedEmail())
            <x-alert icon="o-exclamation-triangle" class="mt-4" title="Email belum terverifikasi. Akses fitur lain akan dibatasi.">
                <x-slot:actions>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <x-button size="sm" class="btn-primary bg-blue-600 border-blue-600">Kirim Ulang Link</x-button>
                    </form>
                </x-slot:actions>
            </x-alert>
        @endif
    </div>
</x-layouts.dashboard>
