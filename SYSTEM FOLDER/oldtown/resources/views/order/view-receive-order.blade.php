@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="md:m-10 m-5 flex-grow">
                <div class="flex items-center">
                    <svg class="h-10 w-10 p-2 text-primary rounded-full border border-secondary-600"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0
                            0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                    <h4 class="px-5 text-2xl">Order</h4>
                </div>
                <x-breadcrumbs-text Title="Order" subtitle="Order Receive" />

                @if (session('status'))
                    <div x-transition.opacity x-data="{ show: true }" x-show="show"
                    x-init="setTimeout(() => show = false, 1000)">
                        <x-alert.success>
                            {{ session('status') }}
                        </x-alert.success>
                    </div>
                @endif

                <x-Tabs.order-tabs />

                <div class="bg-white p-3 border border-t-0">
                    <div class="my-5 mx-3 overflow-x-auto relative border shadow-sm sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                                Order
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    List of Receiving Orders
                                </p>
                            </caption>

                            <thead class="text-xs text-gray-700 uppercase bg-background">

                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Customer ID
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Full Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Email
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Status
                                    </th>
                                    <th scope="col" class="sr-only">
                                        Action
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @forelse ($receiveOrder as $order)
                                    <tr class="bg-white border-b">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900
                                        whitespace-nowrap">
                                            {{ $order->customer_id }}
                                        </th>

                                        <td class="py-4 px-6">
                                            {{ $order->first_name . ' ' . $order->last_name }}
                                        </td>

                                        <td class="py-4 px-6">
                                            {{ $order->email }}
                                        </td>

                                        <td class="py-4 px-6">
                                            {{ $order->status }}
                                        </td>

                                        <td class="py-4 px-6">

                                            <a href="/order/receive-order/{{ $order->customer_id }}"
                                                class="mx-5 font-medium text-emerald-600 hover:underline">
                                                Edit
                                            </a>

                                            <button data-id="{{ $order->customer_id }}"
                                                class="font-medium text-red-600 hover:underline"
                                                onclick="$('#dataid').val($(this).data('id'));
                                                $('#deleteorder').modal('show');">Delete
                                            </button>

                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="4" class="p-5 text-center">
                                            There is no order received
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                        <div class="m-5">
                            {{ $receiveOrder->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </x-flex-view>

        {{-- Delete Modal --}}

        <div id="deleteorder" tabindex="-1" class="hidden">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div>
                    <form action="{{ route('delete-order') }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500">
                                Are you sure you want to delete this order?
                            </h3>

                            <input type="hidden" name="dataid" id="dataid" />

                            <button data-modal-toggle="popup-modal" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4
                                focus:outline-none focus:ring-red-300 font-medium rounded-lg
                                text-sm inline-flex items-center px-5 py-2.5
                                text-center mr-2">
                                Yes, I'm sure
                            </button>

                            <a rel="modal:close"
                                class="cursor-pointer text-gray-500 bg-white hover:bg-gray-100
                                focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border
                                border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900
                                focus:z-10">
                                No, cancel
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('includes.jquery')
    </x-body>
@endsection
