<!-- Sidebar Panel with Collapse/Hover States -->
<div class="h-full flex flex-col transition-all duration-300 ease-in-out" id="sidebar-content" x-data="{ homeOpen: true, settingsOpen: true, userManagementOpen: true }">
    <!-- Header -->
    <div class="h-16 flex items-center justify-center px-4 border-b border-gray-200">
        <div id="sidebar-close" class="rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
            <img src="{{ asset('images/sidebar_expanded.png') }}" alt="expanded logo"
                class="sidebar-logo-expanded sidebar-text w-auto h-8">
            <img src="{{ asset('images/sidebar_collapsed.png') }}" alt="collapsed logo"
                class="sidebar-logo-collapsed hidden w-8 h-8">
        </div>
    </div>

    <!-- User Info -->
    @if (auth()->check())
        <div class="p-4 border-b border-gray-200 sidebar-user-info">
            <div class="flex items-center space-x-3">
                <div
                    class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-medium sidebar-avatar">
                    @if (auth()->user()->image_path)
                        <img src="{{ asset('storage/' . auth()->user()->image_path) }}" alt="Avatar"
                            class="w-10 h-10 rounded-full object-cover">
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
            <div class="collapse collapse-arrow">
                <input type="checkbox" x-model="homeOpen" class="peer">
                <div
                    class="collapse-title flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text min-h-0 p-0">
                    <button @click="homeOpen = !homeOpen"
                        class="flex items-center w-full px-3 py-2 hover:bg-gray-50 rounded-lg transition-colors text-sm font-medium">
                        <x-heroicon-o-home class="mr-2" />
                        <span>Home</span>
                    </button>
                </div>
                <div class="collapse-content" x-show="homeOpen" x-transition>
                    <div class="space-y-1 pl-2">
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-2 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                            <x-heroicon-o-chevron-right class="mx-2 p-1" />
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                        <a href="#"
                            class="flex items-center px-2 py-2 text-sm font-normal text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                            <x-heroicon-o-chevron-right class="mx-2 p-1" />
                            <span class="sidebar-text">Analytics</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="space-y-1">
            <div class="collapse collapse-arrow">
                <input type="checkbox" x-model="settingsOpen" class="peer">
                <div
                    class="collapse-title flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text min-h-0 p-0">
                    <button @click="settingsOpen = !settingsOpen"
                        class="flex items-center w-full px-3 py-2 hover:bg-gray-50 rounded-lg transition-colors text-sm font-medium">
                        <x-heroicon-o-cog class="mr-2" />
                        <span>Settings</span>
                    </button>
                </div>
                <div class="collapse-content" x-show="settingsOpen" x-transition>
                    <div class="space-y-1 pl-2">
                        @can('view-mail')
                        <a href="{{ route('admin.settings.mail.edit') }}"
                            class="flex items-center px-3 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('admin.settings.mail.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                            <x-heroicon-o-chevron-right class="mx-2 p-1" />
                            <span class="sidebar-text">Mail Settings</span>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        <!-- User Management Section -->
        <div class="space-y-1">
            <div class="collapse collapse-arrow">
                <input type="checkbox" x-model="userManagementOpen" class="peer">
                <div
                    class="collapse-title flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text min-h-0 p-0">
                    <button @click="userManagementOpen = !userManagementOpen"
                        class="flex items-center w-full px-3 py-2 hover:bg-gray-50 rounded-lg transition-colors text-sm font-medium">
                        <x-heroicon-o-user-group class="mr-2" />
                        <span>Manage User</span>
                    </button>
                </div>
                <div class="collapse-content" x-show="userManagementOpen" x-transition>
                    <div class="space-y-1 pl-2">
                        @can('view-users')
                            <a href="{{ route('users.index') }}"
                                class="flex items-center px-3 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('users.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                                <x-heroicon-o-chevron-right class="mx-2 p-1" />
                                <span class="sidebar-text">Users</span>
                            </a>
                        @endcan

                        @can('view-roles')
                            <a href="{{ route('roles.index') }}"
                                class="flex items-center px-3 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('roles.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                                <x-heroicon-o-chevron-right class="mx-2 p-1" />
                                <span class="sidebar-text">Roles</span>
                            </a>
                        @endcan

                        @can('view-permissions')
                            <a href="{{ route('permissions.index') }}"
                                class="flex items-center px-3 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('permissions.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                                <x-heroicon-o-chevron-right class="mx-2 p-1" />
                                <span class="sidebar-text">Permissions</span>
                            </a>
                        @endcan

                        @can('view-permission-categories')
                            <a href="{{ route('permission-categories.index') }}"
                                class="flex items-center px-3 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('permission-categories.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                                <x-heroicon-o-chevron-right class="mx-2 p-1" />
                                <span class="sidebar-text">Permission Categories</span>
                            </a>
                        @endcan

                        @can('view-departments')
                            <a href="{{ route('departments.index') }}"
                                class="flex items-center px-3 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('departments.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                                <x-heroicon-o-chevron-right class="mx-2 p-1" />
                                <span class="sidebar-text">Departments</span>
                            </a>
                        @endcan

                        @can('view-customers')
                            <a href="{{ route('customers.index') }}"
                                class="flex items-center px-3 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('customers.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                                <x-heroicon-o-chevron-right class="mx-2 p-1" />
                                <span class="sidebar-text">Customers</span>
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        <!-- Master Data Section -->
        <div class="space-y-1">
            <div class="collapse collapse-arrow">
                <input type="checkbox" x-model="settingsOpen" class="peer">
                <div
                    class="collapse-title flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text min-h-0 p-0">
                    <button @click="settingsOpen = !settingsOpen"
                        class="flex items-center w-full px-3 py-2 hover:bg-gray-50 rounded-lg transition-colors text-sm font-medium">
                        <x-heroicon-o-circle-stack class="mr-2" />
                        <span>Master Data</span>
                    </button>
                </div>
                <div class="collapse-content" x-show="settingsOpen" x-transition>
                    <div class="space-y-1 pl-2">
                        <a href="{{ route('admin.settings.mail.edit') }}"
                            class="flex items-center px-3 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('admin.settings.mail.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                            <x-heroicon-o-chevron-right class="mx-2 p-1" />
                            <span class="sidebar-text">Mail Settings</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- TMR Section -->
        <div class="space-y-1">
            <div class="collapse collapse-arrow">
                <input type="checkbox" x-model="settingsOpen" class="peer">
                <div class="collapse-title flex items-center px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider sidebar-text min-h-0 p-0">
                    <button @click="settingsOpen = !settingsOpen"
                        class="flex items-center w-full px-3 py-2 hover:bg-gray-50 rounded-lg transition-colors text-sm font-medium">
                        <x-heroicon-o-ticket class="mr-2"/>
                        <span>Manage TMR</span>
                    </button>
                </div>
                <div class="collapse-content" x-show="settingsOpen" x-transition>
                    <div class="space-y-1 pl-2">
                        @can('view-invite-tmr')
                        <a href="{{ route('tmr-invites.index') }}"
                            class="flex items-center px-3 py-2 text-sm font-normal rounded-lg transition-colors {{ request()->routeIs('admin.settings.mail.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                            <x-heroicon-o-chevron-right class="mx-2 p-1" />
                            <span class="sidebar-text">Invite TMR</span>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>


    </nav>
</div>

<script>
if (typeof Alpine === 'undefined') {
    console.log('Please include Alpine.js in your layout: <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>');
}
</script>
