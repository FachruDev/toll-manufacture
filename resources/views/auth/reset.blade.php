@php($title = 'Reset Password')
<x-layouts.app :title="$title">
    <div class="max-w-md mx-auto mt-10">
        <x-card shadow>
            <x-slot:title>
                <span class="text-blue-700">Reset Password</span>
            </x-slot:title>
            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <x-input label="Email" name="email" type="email" value="{{ old('email', $email) }}" required />
                <x-input label="Password Baru" name="password" type="password" required />
                <x-input label="Konfirmasi Password" name="password_confirmation" type="password" required />
                <x-button type="submit" class="btn-primary bg-blue-600 border-blue-600">Ubah Password</x-button>
            </form>
            @if ($errors->any())
                <x-alert class="mt-4" title="{{ implode(', ', $errors->all()) }}" icon="o-exclamation-triangle" />
            @endif
        </x-card>
    </div>
</x-layouts.app>

