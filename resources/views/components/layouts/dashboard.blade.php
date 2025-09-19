<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-app-brand />
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" class="bg-base-100 lg:bg-inherit" collapsible right-mobile>

            {{-- BRAND --}}
            <x-app-brand class="px-5 pt-4" />

            {{-- MENU --}}
            <x-menu activate-by-route>

                {{-- User --}}
                @if($user = auth()->user())
                <x-menu-separator />

                <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                    <x-slot:actions>
                            <x-dropdown align="end">
                                <x-slot:trigger>
                                    <x-button icon="o-cog-6-tooth" class="btn-circle btn-ghost btn-xs" tooltip-left="Settings" />
                                </x-slot:trigger>

                                <x-menu-item icon="o-paint-brush" onclick="toggleTheme()">
                                    Toggle theme
                                </x-menu-item>
                                <x-menu-item icon="o-power" link="/logout">
                                    Logout
                                </x-menu-item>
                            </x-dropdown>
                        </x-slot:actions>

                        <x-slot:title>
                            <a href="{{ route('admin.profile.edit') }}" class="btn btn-outline border-blue-600 text-blue-700 w-full inline-flex items-center gap-2">
                                <x-icon name="o-user-circle" class="w-4 h-4" />
                                My Profile
                            </a>
                        </x-slot:title>
                    </x-list-item>

                    <x-menu-separator />
                    @endif
                {{-- Main Navigation --}}
                <x-menu-item title="Home" icon="o-home" link="{{ route('home') }}" tooltip-left="Home" />
                <x-menu-item title="Mail Settings" icon="o-envelope" link="{{ route('admin.settings.mail.edit') }}" tooltip-left="Mail settings" />

            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />

    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        }

        // Load saved theme on page load
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
        });
    </script>
</body>
</html>
