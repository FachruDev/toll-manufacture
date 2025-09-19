@php($title = 'Lupa Password')
<x-layouts.app :title="$title">
    <div class="max-w-md mx-auto mt-10">
        <x-card shadow>
            <x-slot:title>
                <span class="text-blue-700">Lupa Password</span>
            </x-slot:title>
            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf
                <x-input label="Email" name="email" type="email" value="{{ old('email') }}" required />
                <x-button type="submit" class="btn-primary bg-blue-600 border-blue-600">Kirim Link Reset</x-button>
            </form>
            @if (session('status'))
                <x-alert class="mt-4" title="{{ session('status') }}" icon="o-envelope" />
            @endif
            @error('email')
                <x-alert class="mt-4" title="{{ $message }}" icon="o-exclamation-triangle" />
            @enderror
        </x-card>
    </div>
</x-layouts.app>

