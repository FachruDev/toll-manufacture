<aside class="hidden md:flex fixed left-0 top-0 bottom-0 z-50 w-20 flex-col items-center justify-between bg-white shadow-lg py-4">
    <div class="flex flex-col items-center gap-4">
        <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold">
            {{ strtoupper(substr(config('app.name'),0,1)) }}
        </a>
        <a href="{{ route('admin.dashboard') }}" class="tooltip tooltip-right" data-tip="Home">
            <div class="btn btn-ghost btn-square">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-6 h-6 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5l9-7 9 7V19a2 2 0 0 1-2 2h-4.5v-6h-5V21H5a2 2 0 0 1-2-2v-8.5Z"/></svg>
            </div>
        </a>
    </div>
    <div class="flex flex-col items-center gap-3">
        <a href="{{ route('admin.profile.edit') }}" class="tooltip tooltip-right" data-tip="Profile">
            <div class="btn btn-ghost btn-square">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-6 h-6 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 8.25a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5a8.25 8.25 0 1 1 15 0v.75H4.5v-.75Z"/></svg>
            </div>
        </a>
        <a href="{{ route('logout') }}" class="tooltip tooltip-right" data-tip="Logout">
            <div class="btn btn-ghost btn-square">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-6 h-6 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V4.5A2.25 2.25 0 0 0 13.5 2.25h-6A2.25 2.25 0 0 0 5.25 4.5v15A2.25 2.25 0 0 0 7.5 21.75h6a2.25 2.25 0 0 0 2.25-2.25V15M12 12h9m0 0-3-3m3 3-3 3"/></svg>
            </div>
        </a>
    </div>
</aside>
