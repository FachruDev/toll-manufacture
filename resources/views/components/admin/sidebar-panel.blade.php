<!-- Sidebar Panel with Collapse/Hover States -->
<div class="h-full flex flex-col transition-all duration-300 ease-in-out" id="sidebar-content">
    <!-- Header -->
    <div class="h-16 flex items-center justify-center px-4 border-b border-gray-200">
        <div id="sidebar-close" class="rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
            <img src="{{ asset('images/sidebar_expanded.png') }}" alt="expanded logo" class="sidebar-logo-expanded sidebar-text w-auto h-8">
            <img src="{{ asset('images/sidebar_collapsed.png') }}" alt="collapsed logo" class="sidebar-logo-collapsed hidden w-8 h-8">
        </div>
    </div>

    <!-- User Info -->
    @if(auth()->check())
    <div class="p-4 border-b border-gray-200 sidebar-user-info">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-medium sidebar-avatar">
                @if(auth()->user()->image_path)
                    <img src="{{ asset('storage/'.auth()->user()->image_path) }}" alt="Avatar" class="w-10 h-10 rounded-full object-cover">
                @else
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @endif
            </div>
            <div class="flex-1 min-w-0 sidebar-text">
                <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        <!-- Home Section -->
        <div class="space-y-1">
            <div class="flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text">
                Home
            </div>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <x-zondicon-dashboard class="mx-2"/>
                <span class="sidebar-text">Dashboard</span>
            </a>
            <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                <x-zondicon-chart class="mx-2"/>
                <span class="sidebar-text">Analytics</span>
            </a>
        </div>

        <!-- Settings Section -->
        <div class="space-y-1 pt-4">
            <div class="flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text">
                Settings
            </div>
            <a href="{{ route('admin.settings.mail.edit') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.settings.mail.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <x-heroicon-o-envelope class="mx-2"/>
                <span class="sidebar-text">Mail Settings</span>
            </a>
        </div>

        <!-- User Management Section -->
        <div class="space-y-1 pt-4">
            <div class="flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text">
                User Management
            </div>
            @can('manage.users')
            <a href="{{ route('users.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('users.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <x-heroicon-o-users class="mx-2"/>
                <span class="sidebar-text">Users</span>
            </a>
            @endcan
            @can('manage.users')
            <a href="{{ route('customers.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('customers.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <x-heroicon-o-user class="mx-2"/>
                <span class="sidebar-text">Customers</span>
            </a>
            @endcan
            @can('manage.users')
            <a href="{{ route('roles.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('roles.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <x-heroicon-o-shield-check class="mx-2"/>
                <span class="sidebar-text">Roles</span>
            </a>
            @endcan
            @can('manage.users')
            <a href="{{ route('permissions.index') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('permissions.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <x-heroicon-o-lock-closed class="mx-2"/>
                <span class="sidebar-text">Permissions</span>
            </a>
            @endcan
        </div>
    </nav>
</div>
