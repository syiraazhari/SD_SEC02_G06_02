<div>
    <div class="mx-3 font-seoulHangang">
        <div class="grid grid-cols-3 text-center">
            <span class="text-left px-1">Name</span>
            <span>
                <span>Quantity</span>
            </span>
            <span class="sr-only">Action</span>
        </div>
        @if ($content->count() > 0)
            @foreach ($content as $id => $item)
                <div class="text-sm grid grid-cols-3 place-items-center text-center my-3 ">
                    <span>{{ $item->get('name') }}</span>
                    <span class="grid grid-cols-3 place-items-center">
                        <button wire:click="updateCartItem({{ $id }}, 'plus')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        <span>{{ $item->get('quantity') }}</span>
                        <button wire:click="updateCartItem({{ $id }}, 'minus')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </span>
                    <button class="text-base p-2 text-red-500 hover:text-red-600"
                        wire:click="removeFromCart({{ $id }})">Remove</button>
                </div>

            @endforeach
            <div class="flex justify-end">
                <button class="px-5 text-gray-500 text-lg" wire:click="clearCart">Clear Cart</button>
            </div>
            <hr class="my-2">
            <p class="text-xl text-left mt-3 px-3">Total: RM{{ $total }}</p>


            <form action="/checkout" method="POST">
                @csrf
                <input type="hidden" name="total" value="{{ $total }}">
                <div class="m-5">
                    <button class="w-full rounded-md p-2 bg-primary font-seoulHangang text-lg">Checkout</button>
                </div>
            </form>
        @else
            <p class="text-xm text-center font-medium py-3">cart is empty!</p>
        @endif
    </div>
</div>
