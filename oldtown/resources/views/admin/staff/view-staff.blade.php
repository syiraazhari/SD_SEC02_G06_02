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

                    <h4 class="px-5 text-2xl">Staff</h4>
                </div>
                <x-breadcrumbs-text Title="Staff" subtitle="View All Staff" />

                <div class="bg-white p-3">
                    <div class="flex justify-end">

                        <div class="flex items-center mx-3">
                            <a href=""
                                class="px-5 py-2 block rounded-sm font-poppins capitalize shadow-md bg-primary hover:bg-yellow-200">
                                add new staff
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto mt-5 shadow-sm rounded-sm border mb-5">
                        <table class="w-full text-sm text-gray-500 break-normal text-center">
                            <thead class="text-xs text-gray-700 uppercase bg-background ">
                                <tr>
                                    <th scope="col" class="py-3">
                                        Full Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Email
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Contact Number
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Birthdate
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        <span>Action</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="alldata">

                                @foreach ($allstaff as $staff)
                                    <tr class="bg-white border-b hover:bg-gray-50">

                                        <td class="py-4">
                                            {{ $staff->first_name }} {{ $staff->last_name }}
                                        </td>

                                        <td class="py-4 px-6">
                                            {{ $staff->email }}
                                        </td>

                                        <td class="py-4 px-6">
                                            {{ $staff->contact_number }}
                                        </td>

                                        <td class="py-4 px-6">
                                            {{ $staff->birthdate }}
                                        </td>

                                        <td class="py-4 md:px-6 text-center">
                                            <a href="admin/view-staff/{{ $staff->id }}"
                                                class="mx-5 font-medium text-blue-600 hover:underline">View</a>
                                            <a href="#"
                                                class="mx-5 font-medium text-emerald-600 hover:underline">Edit</a>
                                            <a href="#"
                                                class="mx-5 font-medium text-red-600 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                        <div class="m-5">
                            {{ $allstaff->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </x-flex-view>

    </x-body>
@endsection
