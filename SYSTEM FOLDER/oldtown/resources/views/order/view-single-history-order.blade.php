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
                <x-breadcrumbs-text Title="Order" subtitle="Edit Current Order" />

                <x-Tabs.order-tabs />

                <div class="bg-white p-3 font-poppins border border-t-0">
                    <div class="my-5">
                        <a href="{{ route('order-history') }}"
                            class="px-5 py-2 rounded-sm font-poppins capitalize shadow-md bg-primary
                            hover:bg-yellow-200">
                            Back To Order History
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
                            <h3 class="font-bold text-xl p-3 text-right">
                                Total: RM{{ $orderID->total_price }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </x-flex-view>
        @include('includes.jquery')
    </x-body>
@endsection
