<div>
    <nav class="flex justify-between py-5 px-7 bg-primary">
        <div>
            <a href="/">
                <img src="{{asset('storage/images/logo.svg')}}" alt="logo">
            </a>
        </div>

        <button
            class="font-seoulHangang text-secondary flex rounded-2xl px-3 bg-white items-center drop-shadow-md shadow-secondary-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="20"
                height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="6" cy="19" r="2"></circle>
                <circle cx="17" cy="19" r="2"></circle>
                <path d="M17 17h-11v-14h-2"></path>
                <path d="M6 5l14 1l-1 7h-13"></path>
            </svg>
            <span class="mx-2">Cart</span>
            <div
                class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs text-white bg-secondary-600 rounded-full border-2 border-gray-900">
                20</div>
        </button>
    </nav>
</div>
