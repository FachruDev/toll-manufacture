<x-layouts.dashboard>
    <div class="p-4">
        @if(! auth()->user()->hasVerifiedEmail())
            <x-alert icon="o-exclamation-triangle" class="mb-4" title="Email Anda belum terverifikasi">
                <x-slot:actions>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <x-button size="sm" class="btn-primary bg-blue-600 border-blue-600">Kirim Ulang Link</x-button>
                    </form>
                </x-slot:actions>
            </x-alert>
        @endif
        <x-breadcrumbs :items="[['label'=>'Home','url'=>route('home')],['label'=>'Admin']]" />

        <div class="grid gap-4 md:grid-cols-3">
            <x-stat title="Users" value="{{ \App\Models\User::count() }}" icon="o-users" class="bg-blue-600 text-white" />
            <x-stat title="Roles" value="{{ Spatie\Permission\Models\Role::count() }}" icon="o-key" class="bg-blue-500 text-white" />
            <x-stat title="Permissions" value="{{ Spatie\Permission\Models\Permission::count() }}" icon="o-shield-check" class="bg-blue-400 text-white" />
        </div>
    </div>
</x-layouts.dashboard>
