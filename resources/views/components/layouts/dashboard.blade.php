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

    <div class="drawer lg:drawer-open">
        <input id="main-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <div class="navbar sticky top-0 z-40 bg-white border-b shadow-sm px-3 lg:px-5">
                <div class="flex-none lg:hidden">
                    <label for="main-drawer" class="btn btn-ghost btn-square">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </label>
                </div>
                <div class="flex-1 flex items-center gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="text-lg font-semibold text-blue-700">{{ config('app.name') }}</a>
                    <span class="hidden lg:inline-block text-sm text-gray-500">Admin</span>
                </div>
                <div class="hidden lg:flex flex-1 justify-center">
                    <label class="input input-bordered flex items-center gap-2 w-full max-w-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-400"><path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 3.854 12.312l3.792 3.792a.75.75 0 1 0 1.06-1.06l-3.792-3.793A6.75 6.75 0 0 0 10.5 3.75Zm-5.25 6.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Z" clip-rule="evenodd"/></svg>
                        <input type="text" class="grow" placeholder="Search" />
                    </label>
                </div>
                <div class="flex-none">
                    @if($user = auth()->user())
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                @if($user->image_path)
                                    <img alt="avatar" src="{{ asset('storage/'.$user->image_path) }}" />
                                @else
                                    <span class="bg-blue-500 text-white w-full h-full flex items-center justify-center">{{ strtoupper(substr($user->name,0,1)) }}</span>
                                @endif
                            </div>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                            <li class="menu-title px-2">{{ $user->name }}</li>
                            <li><a href="{{ route('admin.profile.edit') }}">My Profile</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

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
        <div class="drawer-side">
            <label for="main-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <aside class="w-72 min-h-full bg-white border-r">
                <div class="p-4 border-b">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-semibold text-blue-700">Admin Panel</a>
                </div>
                <div class="p-4 pt-3 border-b">
                    @if(auth()->check())
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="w-12 rounded-full ring ring-blue-500 ring-offset-base-100 ring-offset-2">
                                    @if(auth()->user()->image_path)
                                        <img alt="avatar" src="{{ asset('storage/'.auth()->user()->image_path) }}" />
                                    @else
                                        <span class="bg-blue-600 text-white w-full h-full flex items-center justify-center text-lg">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="min-w-0">
                                <div class="font-medium text-gray-800 truncate">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                    @endif
                </div>
                <ul class="menu p-4 gap-1">
                    <li>
                        <a class="rounded-md {{ request()->routeIs('admin.dashboard') ? 'active bg-blue-100 text-blue-700' : 'hover:bg-blue-50 hover:text-blue-700' }}" href="{{ route('admin.dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M11.47 3.84a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 1-1.06 1.06l-.78-.78V19.5A2.25 2.25 0 0 1 17.06 21.75H6.94A2.25 2.25 0 0 1 4.69 19.5v-6.69l-.78.78a.75.75 0 1 1-1.06-1.06l8.62-8.69Z"/><path d="M12 5.12l6.75 6.75v7.63a.75.75 0 0 1-.75.75h-3.75v-4.5a2.25 2.25 0 0 0-2.25-2.25h-1.5A2.25 2.25 0 0 0 7.5 15.75v4.5H3.75a.75.75 0 0 1-.75-.75v-7.63L12 5.12Z"/></svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="collapse collapse-arrow bg-blue-50 rounded-md">
                            <input type="checkbox" {{ request()->routeIs('admin.settings.*') ? 'checked' : '' }} />
                            <div class="collapse-title font-medium text-gray-700">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M11.25 1.5a.75.75 0 0 1 .75 0l8.588 4.77a.75.75 0 0 1 .387.657v9.146a.75.75 0 0 1-.387.657l-8.588 4.77a.75.75 0 0 1-.75 0l-8.588-4.77A.75.75 0 0 1 2.25 16.073V6.927a.75.75 0 0 1 .387-.657L11.225 1.5Z"/></svg>
                                    Settings
                                </div>
                            </div>
                            <div class="collapse-content">
                                <ul class="menu p-0">
                                    <li>
                                        <a class="rounded-md {{ request()->routeIs('admin.settings.mail.*') ? 'active bg-blue-100 text-blue-700' : 'hover:bg-blue-100 hover:text-blue-700' }}" href="{{ route('admin.settings.mail.edit') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M1.5 8.67v8.58A2.25 2.25 0 0 0 3.75 19.5h16.5A2.25 2.25 0 0 0 22.5 17.25V8.67l-8.68 5.42a3.75 3.75 0 0 1-3.64 0L1.5 8.67Z"/><path d="M22.5 6.75v-.08A2.25 2.25 0 0 0 20.25 4.5H3.75A2.25 2.25 0 0 0 1.5 6.67v.08l9.19 5.75a2.25 2.25 0 0 0 2.12 0L22.5 6.75Z"/></svg>
                                            Mail Settings
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="mt-2">
                        <a class="rounded-md {{ request()->routeIs('admin.profile.*') ? 'active bg-blue-100 text-blue-700' : 'hover:bg-blue-50 hover:text-blue-700' }}" href="{{ route('admin.profile.edit') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M15.75 6A3.75 3.75 0 1 1 12 2.25 3.75 3.75 0 0 1 15.75 6ZM4.5 20.25A7.5 7.5 0 0 1 12 12.75a7.5 7.5 0 0 1 7.5 7.5.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75Z"/></svg>
                            My Profile
                        </a>
                    </li>
                </ul>
            </aside>
        </div>
    </div>

</body>
</html>
