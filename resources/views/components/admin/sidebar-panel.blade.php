<!-- Sidebar Panel with Collapse/Hover States -->
<div class="h-full flex flex-col transition-all duration-300 ease-in-out" id="sidebar-content">
    <!-- Header -->
    <div class="h-16 flex items-center justify-center px-4 border-b border-gray-200">
        <div id="sidebar-close" class="rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
            <!-- Logo untuk expanded state -->
            <img src="images/sidebar_expanded.png" alt="expanded logo" class="sidebar-logo-expanded sidebar-text w-auto h-8">
            <!-- Logo untuk collapsed state -->
            <img src="images/sidebar_collapsed.png" alt="collapsed logo" class="sidebar-logo-collapsed hidden w-8 h-8">
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
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                </svg>
                <span class="sidebar-text">Dashboard</span>
            </a>
            <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <span class="sidebar-text">Analytics</span>
            </a>
        </div>

        <!-- Settings Section -->
        <div class="space-y-1 pt-4">
            <div class="flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text">
                Settings
            </div>
            <a href="{{ route('admin.settings.mail.edit') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.settings.mail.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="sidebar-text">Mail Settings</span>
            </a>
        </div>

        <!-- Apps Section -->
        <div class="space-y-1 pt-4">
            <div class="flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text">
                Apps
            </div>
            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                </svg>
                <span class="sidebar-text">Demand Planning</span>
            </a>
        </div>
    </nav>
</div>
