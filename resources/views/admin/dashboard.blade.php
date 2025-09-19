@php($title = 'Admin Dashboard')
<x-layouts.app :title="$title">
    <div class="p-4">
        <x-breadcrumb :items="[['label'=>'Home','url'=>route('home')],['label'=>'Admin']]" />

        <div class="grid gap-4 md:grid-cols-3">
            <x-stat title="Users" value="{{ \App\Models\User::count() }}" icon="o-users" class="bg-blue-600 text-white" />
            <x-stat title="Roles" value="{{ Spatie\Permission\Models\Role::count() }}" icon="o-key" class="bg-blue-500 text-white" />
            <x-stat title="Permissions" value="{{ Spatie\Permission\Models\Permission::count() }}" icon="o-shield-check" class="bg-blue-400 text-white" />
        </div>

        <x-card class="mt-6" shadow>
            <x-slot:title>
                <span class="text-blue-700">Quick Links</span>
            </x-slot:title>
            <div class="flex gap-3 flex-wrap">
                <x-button icon="o-cog-6-tooth" class="btn-outline border-blue-600 text-blue-700" href="{{ route('home') }}">Home</x-button>
                <x-button icon="o-user" class="btn-outline border-blue-600 text-blue-700" href="{{ route('logout') }}">Logout</x-button>
            </div>
        </x-card>
    </div>
</x-layouts.app>

