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
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                    <h4 class="px-5 text-2xl">Order</h4>
                </div>
                <x-breadcrumbs-text Title="Order" subtitle="Edit Receive Order" />

                <x-Tabs.order-tabs />

                <div class="bg-white p-3 font-poppins border border-t-0">
                    <div class="my-5">
                        <a href="{{ route('receive-order') }}"
                            class="px-5 py-2 rounded-sm font-poppins capitalize shadow-md bg-primary hover:bg-yellow-200">
                            Back To Order Receive
                        </a>
                    </div>

                    <div class="p-5">
                        <div class="text-right py-2">
                            <h3>TABLE NUBMER: {{$orderID->customer_table}}</h3>
                        </div>
                        <div>
                            <h1>Customer ID: <span class="font-bold">{{ $orderID->customer_id }}</span></h1>
                            <h3>Name:  {{ $orderID->first_name . ' ' . $orderID->last_name }} </h3>
                            <h3>Email: {{ $orderID->email }} </h3>
                            <h3>Phone Number: {{ $orderID->phone_number }} </h3>
                        </div>
                        <div>
                            <h3 class="pt-2 text-lg">Order Description:</h3>
                            <div class="grid grid-cols-2 py-3">
                                <div>
                                    <h3>Menu Name: </h3>
                                    <div class="px-5">
                                        @foreach ($menu_name as $name)
                                        <p>{{ $name,}}</p>
                                        @endforeach
                                    </div>
                                </div>
                                <div>
                                    <h3>Quantity: </h3>
                                    <div class="px-5">
                                        @foreach ($quantity as $quantity)
                                        <p>{{ $quantity,}}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 class="font-bold text-xl p-3 text-right">Total: RM{{ $orderID->total_price }} </h3>
                        </div>
                    </div>

                    <div class="p-3">
                        <h3>Status:</h3>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Change Status</label>
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                            <option value="Cooking">Cooking</option>
                        </select>
                    </div>

                    <div class="flex justify-end p-3">
                        <button type="button" data-id="{{ $orderID->customer_id }}" onclick="$('#dataid').val($(this).data('id')); $('#editorder').modal('show');">
                            <h3 class="bg-emerald-500 px-5 text-white py-2 rounded-md hover:bg-emerald-300">Edit</h3>
                        </button>
                    </div>

                </div>
            </div>
        </x-flex-view>

        <div id="editorder" tabindex="-1" class="hidden">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div>
                    <form action="{{ route('update-receive-order',  $orderID->customer_id ) }}" method="POST">
                        @csrf
                        <div class="p-6 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 3c1.918 0 3.52 1.35 3.91 3.151a4 4 0 0 1 2.09 7.723l0 7.126h-12v-7.126a4.002 4.002 0 1 1 2.092 -7.723a3.999 3.999 0 0 1 3.908 -3.151z"></path>
                                <path d="M6.161 17.009l11.839 -.009"></path>
                             </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Change Status to Cooking?</h3>

                            <input type="hidden" name="dataid" id="dataid" value="" />

                            <button data-modal-toggle="popup-modal" type="submit"
                                class="text-white bg-emerald-600 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>

                            <a rel="modal:close"
                                class="cursor-pointer text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                cancel</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('includes.jquery')
    </x-body>
@endsection
