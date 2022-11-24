@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="grid md:grid-cols-1 w-full h-32">
                <x-dashboard.dashboard-card :menuCount='$menuCount' :orderCount='$order'
                :revenueCount='$revenue' :staffcount='$staffcount' />

                <div class="grid grid-cols-1 md:grid-cols-2 md:h-48">
                    <div
                        class="m-3 flex justify-between items-center bg-teal-400  text-white
                        rounded-sm hover:shadow-md font-prompt">
                        <div class="p-5">
                            <h3 class="font-medium"><span class="font-medium">
                                Restaurant Name:</span> OldTown White Coffe
                            </h3>
                            <h4><span class="font-medium">Location</span> Residensi UtmKl</h4>
                            <h4><span class="font-medium">Address</span>
                                1-18 Gurney Mall, Residensi UTMKL, 8, Jalan Maktab, 54100 Kuala Lumpur
                            </h4>
                        </div>
                    </div>
                    <div class="m-3">
                        <div class="p-5 bg-[#4A5568] shadow-sm text-white rounded-sm font-roboto">
                            Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </div>
                        <div class="pt-3 shadow-sm">
                            <div class=" bg-white py-5 px-3 rounded-sm border">
                                <h3 class="font-medium">
                                    <span class="font-bold">Roles:</span>
                                    {{ Auth::user()->role }}
                                </h3>
                                <h4><span class="font-bold">Created:</span>
                                     {{ Auth::user()->created_at->format('d/m/y') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-64">
                    <div class="p-3 border border-t-0">
                        <div class="overflow-x-auto relative border shadow-sm sm:rounded-lg p-3 bg-white">
                            <table class="bg-white w-full text-sm text-left text-gray-500">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                                    Order
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                        List of Receiving Orders
                                    </p>
                                </caption>

                                <thead class="text-xs text-gray-700 uppercase p-3 border">

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

                                    </tr>

                                </thead>
                                <tbody class="border-l border-r">
                                    @forelse ($receiveOrder as $order)
                                        <tr class="bg-white border-b">
                                            <th scope="row"
                                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
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
                        </div>
                        <div class="m-5">
                            {{ $receiveOrder->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </x-flex-view>
    </x-body>
@endsection
