<div>
    <main class="container mx-auto h-screen md:mb-10 font-seoulHangang">
        <a href="/view-menu/{{ $menu->category_id }}">
            <span>
                <svg class="w-6 h-6 m-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
            </span>
        </a>

        <section class="p-3 flex items-center flex-col">

            <img src="{{ asset('storage/' . $menu->menu_images) }}" alt="" class="md:h-96">

            <div class="p-3">
                <div class="flex justify-between text-2xl my-5">
                    <h3>{{ $menu->menu_name }}</h3>
                    <h3 class="mx-5">RM {{ $menu->selling_price }}</h3>
                </div>
                <div>
                    <p class="text-justify">{{ $menu->description }}</p>
                </div>

                <div class="my-3">

                    <input hidden class="text-center border-none" type="number" min="1" wire:model="quantity">

                    <button wire:click="addToCart" class="bg-primary px-5 py-3 shadow-md rounded-md w-full">
                        Add To Cart
                    </button>
                </div>

            </div>
        </section>
    </main>
</div>
