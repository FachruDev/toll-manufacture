@php($title = 'Customer Login')
<x-layouts.app :title="$title">
    <div class="max-w-md mx-auto mt-10">
        <x-card shadow>
            <x-slot:title>
                <div class="text-blue-700 font-semibold">Login Customer</div>
            </x-slot:title>

            <form method="POST" action="{{ route('customer.login.attempt') }}" class="space-y-4">
                @csrf
                <x-input label="Email" name="email" type="email" value="{{ old('email') }}" required class="w-full" />
                <x-input label="Password" name="password" type="password" required class="w-full" />

                <div class="flex items-center justify-between">
                    <x-button type="submit" class="btn-primary bg-blue-600 border-blue-600">Masuk</x-button>
                </div>
            </form>

            <div class="flex justify-between items-center mt-3">
                <a class="link link-primary" href="{{ route('password.request') }}">Lupa password?</a>
            </div>

            @error('email')
                <x-alert class="mt-4" icon="o-exclamation-triangle" title="{{ $message }}" dismissible />
            @enderror
        </x-card>
    </div>
</x-layouts.app>

