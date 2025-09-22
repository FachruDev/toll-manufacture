<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-gray-50">

    <div class="flex min-h-screen">
        <!-- Sidebar Rail (Collapsed State) -->
        <div id="sidebar-rail" class="hidden">
            <x-admin.sidebar-rail />
        </div>

        <!-- Sidebar Panel (Expanded State) - Default -->
        <div id="sidebar-panel" class="fixed top-0 bottom-0 left-0 z-40 w-64 bg-white shadow-xl border-r border-gray-200 transition-all duration-300 ease-in-out">
            <x-admin.sidebar-panel />
        </div>

        <!-- Mobile Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 transition-all duration-300" id="main-content">
            <x-admin.topbar />

            <main class="p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarRail = document.getElementById('sidebar-rail');
        const sidebarPanel = document.getElementById('sidebar-panel');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const mainContent = document.getElementById('main-content');

        // Default state: expanded (sidebar-panel visible)
        let isExpanded = true;

        function showExpanded() {
            if (!sidebarPanel || !sidebarRail) return;

            // Show sidebar-panel, hide sidebar-rail
            sidebarPanel.classList.remove('hidden');
            sidebarRail.classList.add('hidden');
            isExpanded = true;

            // Adjust main content margin
            if (window.innerWidth >= 1024) {
                if (mainContent) {
                    mainContent.classList.remove('ml-16');
                    mainContent.classList.add('ml-64');
                }
            } else {
                // Mobile: show overlay
                if (sidebarOverlay) {
                    sidebarOverlay.classList.remove('hidden');
                }
                document.body.style.overflow = 'hidden';
            }
        }

        function showCollapsed() {
            if (!sidebarPanel || !sidebarRail) return;

            // Show sidebar-rail, hide sidebar-panel
            sidebarPanel.classList.add('hidden');
            sidebarRail.classList.remove('hidden');
            isExpanded = false;

            // Adjust main content margin
            if (mainContent) {
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-16');
            }

            // Hide overlay
            if (sidebarOverlay) {
                sidebarOverlay.classList.add('hidden');
            }
            document.body.style.overflow = '';
        }

        function toggleSidebar() {
            if (isExpanded) {
                showCollapsed();
            } else {
                showExpanded();
            }
        }

        // Event listeners
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', toggleSidebar);
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', showCollapsed);
        }

        // ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isExpanded) {
                showCollapsed();
            }
        });

        // Handle resize
        window.addEventListener('resize', function() {
            if (isExpanded) {
                if (window.innerWidth >= 1024) {
                    // Desktop: hide overlay, show expanded
                    if (sidebarOverlay) sidebarOverlay.classList.add('hidden');
                    document.body.style.overflow = '';
                    if (mainContent) {
                        mainContent.classList.remove('ml-16');
                        mainContent.classList.add('ml-64');
                    }
                } else {
                    // Mobile: show overlay
                    if (sidebarOverlay) sidebarOverlay.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                    if (mainContent) {
                        mainContent.classList.remove('ml-16');
                        mainContent.classList.add('ml-64');
                    }
                }
            }
        });

        // Initialize default state (expanded)
        showExpanded();
    });
    </script>

</body>
</html>
