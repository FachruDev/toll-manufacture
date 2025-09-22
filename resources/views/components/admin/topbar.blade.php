<div class="navbar sticky top-0 z-40 bg-white shadow-md px-3 lg:px-5">
    <div class="flex-none md:hidden">
        <label for="main-drawer" class="btn btn-ghost btn-square">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </label>
    </div>
    <div class="flex-1 flex items-center gap-3">
        <button type="button" id="sidebar-toggle-desktop" class="hidden md:flex btn btn-ghost btn-square" title="Toggle sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        </button>
        <a href="{{ route('admin.dashboard') }}" class="text-lg font-semibold text-blue-700">{{ config('app.name') }}</a>
        <span class="hidden lg:inline-block text-sm text-gray-500">Admin</span>
    </div>
    <div class="hidden lg:flex flex-1 justify-center">
        <label class="input input-bordered flex items-center gap-2 w-full max-w-md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.35-4.65a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
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
