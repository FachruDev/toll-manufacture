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
        <div id="sidebar-panel" class="fixed top-0 bottom-0 left-0 z-50 w-64 bg-white shadow-xl border-r border-gray-200 transition-all duration-300 ease-in-out">
            <x-admin.sidebar-panel />
        </div>

        <!-- Mobile Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 z-30 hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 transition-all duration-300" id="main-content">
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
        const sidebarPanel = document.getElementById('sidebar-panel');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarClose = document.getElementById('sidebar-close');
        const mainContent = document.getElementById('main-content');

        // Default state: expanded on desktop, collapsed on mobile
        let isCollapsed = window.innerWidth < 1024;
        let isHovering = false;

        function setCollapsed() {
            if (!sidebarPanel) return;

            isCollapsed = true;

            if (window.innerWidth >= 1024) {
                // Desktop collapsed: narrow sidebar fixed, main content with padding
                sidebarPanel.classList.remove('w-64', '-translate-x-full', 'relative');
                sidebarPanel.classList.add('w-20', 'fixed');

                // Hide text elements but show icons and avatar
                const textElements = sidebarPanel.querySelectorAll('.sidebar-text');
                textElements.forEach(el => {
                    el.style.display = 'none';
                });

                // Make icons bigger for collapsed state
                const icons = sidebarPanel.querySelectorAll('svg');
                icons.forEach(icon => {
                    icon.classList.remove('w-5', 'h-5');
                    icon.classList.add('w-8', 'h-8');
                });

                // Center menu items for collapsed state
                const menuItems = sidebarPanel.querySelectorAll('nav a');
                menuItems.forEach(item => {
                    item.classList.add('justify-center');
                    item.classList.remove('px-3');
                    item.classList.add('px-2');
                });

                // Show collapsed logo, hide expanded logo
                const expandedLogo = sidebarPanel.querySelector('.sidebar-logo-expanded');
                const collapsedLogo = sidebarPanel.querySelector('.sidebar-logo-collapsed');
                if (expandedLogo) expandedLogo.classList.add('hidden');
                if (collapsedLogo) collapsedLogo.classList.remove('hidden');

                // Keep user avatar visible but hide user info text
                const userInfo = sidebarPanel.querySelector('.sidebar-user-info');
                const avatar = sidebarPanel.querySelector('.sidebar-avatar');
                if (userInfo) {
                    userInfo.classList.add('flex', 'justify-center', 'p-4');
                    userInfo.classList.remove('p-6');
                }
                if (avatar) {
                    avatar.classList.add('w-10', 'h-10');
                    avatar.classList.remove('w-12', 'h-12');
                }

                // Adjust main content padding for desktop
                if (mainContent) {
                    mainContent.classList.remove('ml-64', 'pl-64');
                    mainContent.classList.add('pl-16');
                }

                // Ensure no overlay on desktop
                if (sidebarOverlay) {
                    sidebarOverlay.classList.add('hidden');
                }
            } else {
                // Mobile collapsed: hide sidebar completely
                sidebarPanel.classList.remove('w-16', 'relative');
                sidebarPanel.classList.add('w-64', 'fixed', '-translate-x-full');

                // Show all text for when it becomes visible
                const textElements = sidebarPanel.querySelectorAll('.sidebar-text');
                textElements.forEach(el => {
                    el.style.display = '';
                });

                // Reset icons to normal size for mobile
                const icons = sidebarPanel.querySelectorAll('svg');
                icons.forEach(icon => {
                    icon.classList.remove('w-8', 'h-8');
                    icon.classList.add('w-5', 'h-5');
                });

                // Reset menu items layout for mobile
                const menuItems = sidebarPanel.querySelectorAll('nav a');
                menuItems.forEach(item => {
                    item.classList.remove('justify-center');
                    item.classList.remove('px-2');
                    item.classList.add('px-3');
                });

                // Reset logos for mobile
                const expandedLogo = sidebarPanel.querySelector('.sidebar-logo-expanded');
                const collapsedLogo = sidebarPanel.querySelector('.sidebar-logo-collapsed');
                if (expandedLogo) expandedLogo.classList.remove('hidden');
                if (collapsedLogo) collapsedLogo.classList.add('hidden');

                // Reset user info for mobile
                const userInfo = sidebarPanel.querySelector('.sidebar-user-info');
                const avatar = sidebarPanel.querySelector('.sidebar-avatar');
                if (userInfo) {
                    userInfo.classList.remove('flex', 'justify-center', 'p-2');
                    userInfo.classList.add('p-4');
                }
                if (avatar) {
                    avatar.classList.remove('w-8', 'h-8');
                    avatar.classList.add('w-10', 'h-10');
                }

                // Remove margin on mobile
                if (mainContent) {
                    mainContent.classList.remove('ml-64', 'ml-16');
                }

                // Hide overlay
                if (sidebarOverlay) {
                    sidebarOverlay.classList.add('hidden');
                }
            }
        }

        function setExpanded() {
            if (!sidebarPanel) return;

            isCollapsed = false;

            // Show all text elements
            const textElements = sidebarPanel.querySelectorAll('.sidebar-text');
            textElements.forEach(el => {
                el.style.display = '';
            });

            // Reset icons to normal size for expanded state
            const icons = sidebarPanel.querySelectorAll('svg');
            icons.forEach(icon => {
                icon.classList.remove('w-8', 'h-8');
                icon.classList.add('w-5', 'h-5');
            });

            // Reset menu items layout for expanded state
            const menuItems = sidebarPanel.querySelectorAll('nav a');
            menuItems.forEach(item => {
                item.classList.remove('justify-center');
                item.classList.remove('px-2');
                item.classList.add('px-3');
            });

            // Show expanded logo, hide collapsed logo
            const expandedLogo = sidebarPanel.querySelector('.sidebar-logo-expanded');
            const collapsedLogo = sidebarPanel.querySelector('.sidebar-logo-collapsed');
            if (expandedLogo) expandedLogo.classList.remove('hidden');
            if (collapsedLogo) collapsedLogo.classList.add('hidden');

            // Reset user info layout
            const userInfo = sidebarPanel.querySelector('.sidebar-user-info');
            const avatar = sidebarPanel.querySelector('.sidebar-avatar');
            if (userInfo) {
                userInfo.classList.remove('flex', 'justify-center', 'p-2');
                userInfo.classList.add('p-4');
            }
            if (avatar) {
                avatar.classList.remove('w-8', 'h-8');
                avatar.classList.add('w-10', 'h-10');
            }

            if (window.innerWidth >= 1024) {
                // Desktop expanded: sidebar fixed, main content with padding
                sidebarPanel.classList.remove('w-16', '-translate-x-full', 'relative');
                sidebarPanel.classList.add('w-64', 'fixed');

                if (mainContent) {
                    mainContent.classList.remove('ml-16', 'pl-64');
                    mainContent.classList.add('pl-64');
                }

                // Ensure no overlay on desktop
                if (sidebarOverlay) {
                    sidebarOverlay.classList.add('hidden');
                }
            } else {
                // Mobile expanded: show sidebar with overlay
                sidebarPanel.classList.remove('w-16', '-translate-x-full', 'relative');
                sidebarPanel.classList.add('w-64', 'fixed');

                // Remove margin on mobile
                if (mainContent) {
                    mainContent.classList.remove('ml-64', 'ml-16');
                }

                // Show overlay on mobile (transparent, for closing)
                if (sidebarOverlay) {
                    sidebarOverlay.classList.remove('hidden');
                }
            }
        }

        function toggleSidebar() {
            if (isCollapsed) {
                setExpanded();
            } else {
                setCollapsed();
            }
        }

        // Toggle button event
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', toggleSidebar);
        }

        // Close button event (in sidebar header)
        if (sidebarClose) {
            sidebarClose.addEventListener('click', function() {
                setCollapsed();
            });
        }

        // Hover events for collapsed state (desktop only)
        if (sidebarPanel) {
            sidebarPanel.addEventListener('mouseenter', function() {
                if (isCollapsed && window.innerWidth >= 1024) {
                    isHovering = true;
                    setExpanded();
                }
            });

            sidebarPanel.addEventListener('mouseleave', function() {
                if (isCollapsed && isHovering && window.innerWidth >= 1024) {
                    isHovering = false;
                    setCollapsed();
                }
            });
        }

        // Mobile overlay click
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                if (window.innerWidth < 1024) {
                    setCollapsed();
                }
            });
        }

        // ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                setCollapsed();
            }
        });

        // Handle resize
        window.addEventListener('resize', function() {
            const wasCollapsed = isCollapsed;

            if (window.innerWidth >= 1024) {
                // Switching to desktop
                if (sidebarOverlay) {
                    sidebarOverlay.classList.add('hidden');
                }

                if (wasCollapsed) {
                    setCollapsed(); // Apply desktop collapsed styles
                } else {
                    setExpanded(); // Apply desktop expanded styles
                }
            } else {
                // Switching to mobile
                if (wasCollapsed) {
                    setCollapsed(); // Apply mobile collapsed styles
                } else {
                    setExpanded(); // Apply mobile expanded styles
                }
            }
        });

        // Initialize state based on screen size
        if (window.innerWidth >= 1024) {
            setExpanded(); // Desktop starts expanded
        } else {
            setCollapsed(); // Mobile starts collapsed
        }
    });
    </script></body>
</html>
