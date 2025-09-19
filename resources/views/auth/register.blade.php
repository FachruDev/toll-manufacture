@php($title = 'Register Customer')
<x-layouts.app :title="$title">
    <div class="max-w-lg mx-auto mt-8">
        <x-card shadow>
            <x-slot:title>
                <span class="text-blue-700">Buat Akun Customer</span>
            </x-slot:title>
            <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
                @csrf
                <x-input label="Nama" name="name" value="{{ old('name') }}" required />
                <x-input label="Email" type="email" name="email" value="{{ old('email') }}" required />
                <x-input label="Perusahaan" name="company" value="{{ old('company') }}" />
                <x-input label="Telepon" name="phone" value="{{ old('phone') }}" />
                <x-input label="Password" type="password" name="password" required />
                <x-input label="Konfirmasi Password" type="password" name="password_confirmation" required />
                <div class="flex items-center justify-between">
                    <x-button type="submit" class="btn-primary bg-blue-600 border-blue-600">Daftar</x-button>
                    <a class="link link-primary" href="{{ route('login') }}">Sudah punya akun?</a>
                </div>
            </form>

            @if ($errors->any())
                <x-alert class="mt-4" icon="o-exclamation-triangle" title="Terjadi kesalahan" :text="implode(', ', $errors->all())" />
            @endif
        </x-card>
    </div>
</x-layouts.app>

