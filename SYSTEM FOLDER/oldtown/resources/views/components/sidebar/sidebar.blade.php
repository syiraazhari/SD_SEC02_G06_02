<div class="w-64 hidden md:block  h-screen px-4 py-8 bg-secondary-600 border-r text-white shadow-gray-400 shadow-md">

    {{-- dashboard --}}
    <a href="{{ route('staff_dashboard') }}"
        class="mb-3 block {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
        <x-sidebar.sidebar-link>

            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>

            <x-sidebar.sidebar-text>
                Dashboard
            </x-sidebar.sidebar-text>
        </x-sidebar.sidebar-link>
    </a>

    {{-- Order --}}
    <a href="{{ route('receive-order') }}" class="mb-3 block {{ request()->segment(1) == 'order' ? 'active' : '' }}">
        <x-sidebar.sidebar-link>

            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
            </svg>

            <x-sidebar.sidebar-text>
                Order
            </x-sidebar.sidebar-text>
        </x-sidebar.sidebar-link>
    </a>

    <div
        class="mb-3 flex items-center px-4 py-2 transition-colors duration-200 transform rounded-md hover:border-primary hover:border  hover:text-primary">
        <button type="button" class="flex items-center justify-between" aria-controls="dropdown-example"
            data-collapse-toggle="dropdown-example">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
            </svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Menu</span>
            <svg sidebar-toggle-item class="w-6 h-6 ml-5 block" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <ul id="dropdown-example" class="hidden py-2 space-y-2">
        @if (Auth::user()->role === 'admin')
            <li data-accordion="open">
                <a href="{{ route('category-view') }}"
                    class="mb-3 ml-5 block {{ request()->is('admin/menu/category') ? 'active' : '' }}">
                    <x-sidebar.sidebar-link>
                        <x-sidebar.sidebar-text>
                            View Category
                        </x-sidebar.sidebar-text>
                    </x-sidebar.sidebar-link>
                </a>
            </li>
        @endif

        <li>
            <a href="{{ route('menu-view') }}"
                class="mb-3 ml-5 block {{ request()->segment(2) == 'view-menu' ? 'active' : '' }}">
                <x-sidebar.sidebar-link>
                    <x-sidebar.sidebar-text>
                        View Menu
                    </x-sidebar.sidebar-text>
                </x-sidebar.sidebar-link>
            </a>
        </li>

    </ul>

    {{-- Report --}}
    <a href="/report" class="mb-3 block {{ request()->segment(1) == 'report' ? 'active' : '' }} ">
        <x-sidebar.sidebar-link>

            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>

            <x-sidebar.sidebar-text>
                Report
            </x-sidebar.sidebar-text>
        </x-sidebar.sidebar-link>
    </a>

    <hr class="my-6 border-gray-200" />

    @if (Auth::user()->role === 'admin')
        <a href="{{ route('view-staff') }}" class="mb-3 block {{ request()->segment(2) == 'staff' ? 'active' : '' }} ">
            <x-sidebar.sidebar-link>

                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>

                <x-sidebar.sidebar-text>
                    Staff
                </x-sidebar.sidebar-text>
            </x-sidebar.sidebar-link>
        </a>

    @endif




</div>
