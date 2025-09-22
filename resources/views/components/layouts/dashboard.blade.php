<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-base-200">

    <div class="flex min-h-screen">
        <!-- Collapsed rail (desktop/tablet) -->
        <x-admin.sidebar-rail />

        <!-- Drawer panel (sidebar) + content -->
        <div class="drawer flex-1 md:pl-20">
            <input id="main-drawer" type="checkbox" class="drawer-toggle" />

            <div class="drawer-content flex flex-col">
                <x-admin.topbar />

                <main class="p-4">
                    @if(session('success'))
                        <div class="toast toast-top toast-end">
                            <div class="alert alert-success">
                                <span>{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif
                    {{ $slot }}
                </main>
            </div>

            <x-admin.sidebar-panel />
        </div>
    </div>

</body>
</html>
