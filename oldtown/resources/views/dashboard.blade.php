@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="grid md:grid-cols-1 w-full h-32">
                <x-dashboard.dashboard-card staffcount="{{ $staffcount }}" menuCount={{$menuCount}} orderCount= {{ $order }}/>

                <div class="grid grid-cols-1 md:grid-cols-2 md:h-48">
                    <div
                        class="m-3 flex justify-between items-center bg-teal-400  text-white rounded-sm hover:shadow-md font-prompt">
                        <div class="p-5">
                            <h3 class="font-medium"><span class="font-medium">Restaurant Name:</span> OldTown White Coffe
                            </h3>
                            <h4><span class="font-medium">Location</span> Residensi UtmKl</h4>
                            <h4><span class="font-medium">Address</span> 1-18 Gurney Mall, Residensi UTMKL, 8, Jalan Maktab,
                                54100 Kuala Lumpur</h4>
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
                                <h4><span class="font-bold">Created:</span> {{ Auth::user()->created_at->format('d/m/y') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-64">
                    <div class="overflow-x-auto mx-3 shadow-sm rounded-sm border mb-5">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Menu
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Order Number
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Category
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Price
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Status
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        <span>Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                        Nasi Lemuc'k
                                    </th>
                                    <td class="py-4 px-6">
                                        1
                                    </td>
                                    <td class="py-4 px-6">
                                        Food
                                    </td>
                                    <td class="py-4 px-6">
                                        $2999
                                    </td>
                                    <td class="py-4 px-6">
                                        Cooking
                                    </td>
                                    <td class="py-4 md:px-6 text-center">
                                        <a href="#" class="mx-5 font-medium text-red-600 hover:underline">Delete</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </x-flex-view>

    </x-body>
@endsection
