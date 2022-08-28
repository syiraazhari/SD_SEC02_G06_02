<aside class="hidden lg:block fixed z-10 top-0 h-screen p-6 bg-primary shadow-lg flex-none">
    <div class="flex flex-col flex-wrap">
        <div class="flex flex-col">
            <h3 class="font-Prompt text-xl text-center tracking-[.22em] border-b border-black pb-3">
                STAFFDESK</h3>
            <span class="block p-3 font-RobotoSlab ">OldTown White Coffee</span>
        </div>
        <div>
            <span class="block text-left text-blackie">Menu</span>
            <div class="flex flex-col gap-y-5 mt-5">
                <a href="{{ route('dashboard') }}"
                    class=" {{ request()->is('staff/dashboard') ? 'active' : '' }}
                    font-Roboto text-lg p-3 rounded-lg hover:bg-secondary hover:text-white">
                    <i class="fa-solid fa-house px-3"></i>
                    Dashboard
                </a>
                <a href=""
                    class="text-blackie font-Roboto text-lg font-normal p-3 rounded-lg hover:bg-secondary hover:text-white">
                    <i class="fa-solid fa-list px-3"></i>
                    Order
                </a>
            </div>
            <span class="block text-left text-blackie mt-5">Other</span>
            <div class="flex flex-col mt-2 gap-y-5">
                <a href=""
                    class="text-blackie font-Roboto text-lg font-normal p-3 rounded-lg hover:bg-secondary hover:text-white">
                    <i class="fa-solid fa-file-arrow-up px-3"></i>
                    Report
                </a>
            </div>
        </div>
</aside>
