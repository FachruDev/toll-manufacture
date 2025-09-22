<div class="drawer-side md:left-20 z-40">
    <label for="main-drawer" aria-label="close sidebar" class="drawer-overlay md:left-20"></label>
    <aside class="w-80 min-h-full bg-white">
        <div class="p-4 flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-semibold text-blue-700">Admin Panel</a>
            <button type="button" id="sidebar-collapse" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
        </div>
        <div class="p-4 pt-0">
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
        <ul class="menu menu-clean p-4 gap-1">
            <li>
                <div class="collapse collapse-arrow rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50' : 'bg-base-100 hover:bg-blue-50' }}">
                    <input type="checkbox" {{ request()->routeIs('admin.dashboard') ? 'checked' : '' }} />
                    <div class="collapse-title font-medium text-gray-700">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5l9-7 9 7V19a2 2 0 0 1-2 2h-4.5v-6h-5V21H5a2 2 0 0 1-2-2v-8.5Z"/></svg>
                            <span class="text-sm">Home</span>
                        </div>
                    </div>
                    <div class="collapse-content">
                        <ul class="menu p-0">
                            <li>
                                <a class="rounded-md flex items-center gap-3 no-underline {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-700 focus:bg-blue-50 focus:text-blue-700 active:bg-blue-100' }}" href="{{ route('admin.dashboard') }}">
                                    <span class="text-sm">Overview</span>
                                </a>
                            </li>
                            <li>
                                <a class="rounded-md flex items-center gap-3 no-underline text-gray-700 hover:bg-blue-100 hover:text-blue-700 focus:bg-blue-50 focus:text-blue-700 active:bg-blue-100" href="#">
                                    <span class="text-sm">Live Network</span>
                                </a>
                            </li>
                            <li>
                                <a class="rounded-md flex items-center gap-3 no-underline text-gray-700 hover:bg-blue-100 hover:text-blue-700 focus:bg-blue-50 focus:text-blue-700 active:bg-blue-100" href="#">
                                    <span class="text-sm">To-Do's</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="collapse collapse-arrow rounded-lg {{ request()->routeIs('admin.settings.*') ? 'bg-blue-50' : 'bg-base-100 hover:bg-blue-50' }}">
                    <input type="checkbox" {{ request()->routeIs('admin.settings.*') ? 'checked' : '' }} />
                    <div class="collapse-title font-medium text-gray-700">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75V4.5m0 15v-2.25m7.5-7.5h2.25M1.5 12H3.75m12.727 6.364l1.591 1.591M6.932 6.932L5.341 5.341m10.136 0l1.591-1.591M6.932 17.068l-1.591 1.591"/></svg>
                            <span class="text-sm">Settings</span>
                        </div>
                    </div>
                    <div class="collapse-content">
                        <ul class="menu p-0">
                            <li>
                                <a class="rounded-md flex items-center gap-3 no-underline {{ request()->routeIs('admin.settings.mail.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-700 focus:bg-blue-50 focus:text-blue-700 active:bg-blue-100' }}" href="{{ route('admin.settings.mail.edit') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5 {{ request()->routeIs('admin.settings.mail.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6.75l9 6.75 9-6.75M4.5 18.75h15a1.5 1.5 0 0 1 1.5-1.5v-9"/></svg>
                                    <span class="text-sm">Mail Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="mt-2">
                <div class="menu-title text-xs text-gray-400 uppercase">Apps</div>
            </li>
            <li>
                <a class="rounded-lg flex items-center gap-3 no-underline text-gray-700 hover:bg-blue-50 hover:text-blue-700 focus:bg-blue-50 focus:text-blue-700 active:bg-blue-100" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75h16.5v4.5H3.75v-4.5Zm0 6.75h16.5v9.75H3.75V10.5Zm4.5 3.75h7.5"/></svg>
                    <span class="text-sm">Demand Planning</span>
                </a>
            </li>
            <li>
                <a class="rounded-lg flex items-center gap-3 no-underline text-gray-700 hover:bg-blue-50 hover:text-blue-700 focus:bg-blue-50 focus:text-blue-700 active:bg-blue-100" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15M19.5 12H4.5"/></svg>
                    <span class="text-sm">Add Module</span>
                </a>
            </li>
            <li class="mt-2">
                <a class="rounded-lg flex items-center gap-3 no-underline {{ request()->routeIs('admin.profile.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700 focus:bg-blue-50 focus:text-blue-700 active:bg-blue-100' }}" href="{{ route('admin.profile.edit') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="w-5 h-5 {{ request()->routeIs('admin.profile.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 8.25a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5a8.25 8.25 0 1 1 15 0v.75H4.5v-.75Z"/></svg>
                    <span class="text-sm font-medium">My Profile</span>
                </a>
            </li>
        </ul>
    </aside>
</div>

<style>
    /* Remove dark default overlay on menu hover for this component */
    .menu.menu-clean :where(li:not(.menu-title) > *:not(ul):not(details):not(.menu-title)):hover {
        background-color: transparent !important;
    }
    .menu.menu-clean :where(li > *:not(ul):not(details):not(.menu-title)):focus {
        outline: none;
        box-shadow: none;
    }
    /* Smooth drawer animation */
    .drawer-side > aside { transition: transform 200ms ease; }
</style>

<script>
    (function(){
        const drawer = document.getElementById('main-drawer');
        const appsBtn = document.getElementById('apps-toggle');
        const collapseBtn = document.getElementById('sidebar-collapse');
        const desktopToggle = document.getElementById('sidebar-toggle-desktop');

        function setDrawer(open){
            if (!drawer) return;
            drawer.checked = !!open;
            try { localStorage.setItem('drawer-open', drawer.checked ? '1' : '0'); } catch(e){}
        }

        document.addEventListener('DOMContentLoaded', function(){
            try {
                const saved = localStorage.getItem('drawer-open');
                if (saved !== null) setDrawer(saved === '1');
            } catch(e){}
        });

        if (appsBtn) appsBtn.addEventListener('click', function(e){ e.preventDefault(); setDrawer(!drawer.checked); });
        if (desktopToggle) desktopToggle.addEventListener('click', function(e){ e.preventDefault(); setDrawer(!drawer.checked); });
        if (collapseBtn) collapseBtn.addEventListener('click', function(e){ e.preventDefault(); setDrawer(false); });
    })();
</script>
