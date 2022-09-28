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

                @if (session('status'))
                    <div x-transition.opacity x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 1000)">
                        <x-alert.success>
                            {{ session('status') }}
                        </x-alert.success>
                    </div>
                @endif

                <div class="bg-white p-3">
                    <div class="flex justify-end">

                        <div class="flex items-center mx-3">
                            <a href="staff/add-staff"
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
                                @forelse ($allstaff as $staff)
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
                                            <a href="staff/view-staff/{{ $staff->id }}"
                                                class="mx-5 font-medium text-blue-600 hover:underline">View</a>
                                            <a href="staff/edit-staff/{{ $staff->id }}"
                                                class="mx-5 font-medium text-emerald-600 hover:underline">Edit</a>
                                            <button class="mx-5 font-medium text-red-600 hover:underline" type="button"
                                                data-modal-toggle="popup-modal">Delete</button>
                                        </td>
                                    </tr>
                                    {{-- popup modal --}}
                                    <div id="popup-modal" tabindex="-1"
                                        class="hidden overflow-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center"
                                        aria-hidden="true">
                                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                            <div class="relative bg-gray-100 rounded-lg shadow ">
                                                <button type="button"
                                                    class="absolute top-3 right-2.5 text-gray-600 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                    data-modal-toggle="popup-modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want
                                                        to
                                                        delete this staff?</h3>
                                                    <form action="/admin/staff/{{ $staff->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button data-modal-toggle="popup-modal" type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                            Yes, I'm sure
                                                        </button>
                                                        <a href="#">
                                                            <button data-modal-toggle="popup-modal" type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                                                No
                                                            </button>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <td colspan="6 " class="pt-3 font-bold font-poppins text-xl text-center">
                                        There is no data
                                    <td>
                                @endforelse
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
