@php($title = 'Customer Dashboard')
<x-layouts.app :title="$title">
    <div class="p-4">
        <x-breadcrumb :items="[['label'=>'Home','url'=>route('home')],['label'=>'Customer']]" />

        <x-card shadow>
            <x-slot:title>
                <span class="text-blue-700">Welcome, {{ auth()->user()->name }}</span>
            </x-slot:title>
            <p class="text-sm text-gray-600">Panel customer sederhana. Nantinya form TMR dan status akan tampil di sini.</p>
            <div class="mt-4">
                <x-button class="btn-primary bg-blue-600 border-blue-600">Action Placeholder</x-button>
            </div>
        </x-card>
    </div>
</x-layouts.app>

