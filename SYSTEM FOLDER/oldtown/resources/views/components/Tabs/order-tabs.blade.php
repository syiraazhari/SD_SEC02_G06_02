<div class="inline-flex">
    <a href="{{ route('receive-order') }}">
        <button
            class="flex items-center h-12 px-4 py-2 text-sm text-center text-gray-700 border-b  sm:text-base rounded-t-md whitespace-nowrap focus:outline-none hover:border-b-primary {{ request()->segment(2) == 'receive-order' ? 'bg-white border border-b-0 border-gray-300 hover:border-b-0' : '' }}">
            Order Receive
        </button>
    </a>

    <a href="{{ route('current-order') }}">
        <button
            class="flex items-center h-12 px-4 py-2 text-sm text-center text-gray-700 border-b  sm:text-base whitespace-nowrap cursor-base focus:outline-none hover:border-primary {{ request()->segment(2) == 'current-order' ? 'bg-white border border-b-0 border-gray-300 hover:border-b-0' : '' }}">
            Current Order
        </button>
    </a>

    <a href="{{ route('order-history') }}">
        <button
            class="flex items-center h-12 px-4 py-2 text-sm text-center text-gray-700 border-b sm:text-base whitespace-nowrap cursor-base focus:outline-none hover:border-primary {{ request()->segment(2) == 'order-history' ? 'bg-white border border-b-0 border-gray-300 hover:border-b-0' : '' }}">
            Order History
        </button>
    </a>
</div>
