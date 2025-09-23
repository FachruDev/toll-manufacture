<!-- Topbar -->
<header class="bg-white shadow-sm border-b border-gray-200 h-16 flex items-center px-4">
    <!-- Left Side -->
    <div class="flex items-center space-x-4">
        <!-- Sidebar Toggle -->
        <button id="sidebar-toggle" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
            <x-heroicon-o-chevron-right class="w-6 h-6"/>
        </button>
    </div>

    <!-- Spacer -->
    <div class="flex-1"></div>

    <!-- Right Side -->
    <div class="flex items-center space-x-4">
        <!-- Search (Desktop only) -->
        <div class="hidden lg:block">
            <div class="relative">
                <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:border-transparent w-64">
                <x-zondicon-search class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"/>

            </div>
        </div>

        <!-- Notifications -->
        <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors relative">
            <x-heroicon-s-bell class="w-6  h-6"/>
            <!-- Notification Badge -->
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
        </button>

        <!-- User Menu -->
        @if($user = auth()->user())
        <div class="relative">
            <button id="user-menu-toggle" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-medium text-sm">
                    @if($user->image_path)
                        <img src="{{ asset('storage/'.$user->image_path) }}" alt="Avatar" class="w-8 h-8 rounded-full object-cover">
                    @else
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    @endif
                </div>
                <div class="hidden md:block text-left">
                    <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                    <p class="text-xs text-gray-500">Admin</p>
                </div>
                <x-heroicon-s-chevron-down class="w-4 h-4 text-gray-400"/>
            </button>

            <!-- Dropdown Menu -->
            <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50">
                <a href="{{ route('admin.profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <x-heroicon-s-user-circle class="w-4 h-4 mr-3"/>
                    My Profile
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <x-heroicon-o-cog class="w-4 h-4 mr-3"/>
                    Settings
                </a>
                <hr class="my-1">
                <a href="{{ route('logout') }}" class="flex items-center px-4 py-2 text-sm text-red-700 hover:bg-red-50">
                    <x-heroicon-s-arrow-left-end-on-rectangle class="w-4 h-4 mr-3"/>
                    Logout
                </a>
            </div>
        </div>
        @endif
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // User menu dropdown
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenu = document.getElementById('user-menu');

    if (userMenuToggle && userMenu) {
        userMenuToggle.addEventListener('click', function() {
            userMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!userMenuToggle.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    }
});
</script>
