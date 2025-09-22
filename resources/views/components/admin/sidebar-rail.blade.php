<!-- Sidebar Rail (Collapsed State) -->
<aside class="fixed left-0 top-0 bottom-0 z-40 w-16 bg-white shadow-lg border-r border-gray-200 flex flex-col items-center py-4">
    <!-- Logo -->
    <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold text-sm mb-6">
        {{ strtoupper(substr(config('app.name'), 0, 1)) }}
    </div>

    <!-- Navigation Icons -->
    <nav class="flex flex-col space-y-2 flex-1">
        <!-- Home -->
        <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}" title="Dashboard">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
            </svg>
        </a>

        <!-- Settings -->
        <a href="{{ route('admin.settings.mail.edit') }}" class="w-10 h-10 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}" title="Settings">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </a>

        <!-- Apps -->
        <a href="#" class="w-10 h-10 rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-100 transition-colors" title="Apps">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
        </a>
    </nav>

    <!-- Bottom Actions -->
    <div class="flex flex-col space-y-3">
        <!-- Profile -->
        <a href="{{ route('admin.profile.edit') }}" class="w-10 h-10 rounded-lg flex items-center justify-center transition-colors {{ request()->routeIs('admin.profile.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}" title="Profile">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </a>
    </div>
</aside>
