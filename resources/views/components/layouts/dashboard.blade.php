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
        <!-- Sidebar Panel (Single sidebar with collapse/expand + hover) -->
        <div id="sidebar-panel" class="fixed top-0 bottom-0 left-0 z-50 w-64 bg-white shadow-xl border-r border-gray-200 transition-all duration-300 ease-in-out">
            <x-admin.sidebar-panel />
        </div>

        <!-- Mobile Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 z-30 hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 transition-all duration-300" id="main-content">
            <!-- Topbar (Sticky for desktop) -->
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
                sidebarPanel.classList.add('w-16', 'fixed');

                // Hide only text, keep icons and profile photo
                const textElements = sidebarPanel.querySelectorAll('.sidebar-text');
                textElements.forEach(el => {
                    el.style.display = 'none';
                });

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
