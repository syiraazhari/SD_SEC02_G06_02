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

                    <h4 class="px-5 text-2xl">Menu</h4>
                </div>
                <x-breadcrumbs-text Title="Category" subtitle="All Category" />

                @if (session('status'))
                    <div x-transition.opacity x-data="{ show: true }" x-show="show"
                    x-init="setTimeout(() => show = false, 1000)">
                        <x-alert.success>
                            {{ session('status') }}
                        </x-alert.success>
                    </div>
                @endif

                <div class="bg-white p-3">
                    <div class="flex justify-end mb-5">
                        <div class="flex items-center mx-3">
                            <a href="category/add-category"
                                class="px-5 py-2 block rounded-sm font-poppins capitalize shadow-md
                                bg-primary hover:bg-yellow-200">
                                add new Category
                            </a>
                        </div>
                    </div>


                    <div class="overflow-x-auto relative border shadow-md sm:rounded-lg mx-3">
                        <table class="w-1/2 text-sm text-left text-gray-500 m-5 border">
                            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                                Categories
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    List of Menu Categories
                                </p>
                            </caption>

                            <thead class="text-xs text-gray-700 uppercase bg-background">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        No
                                    </th>

                                    <th scope="col" class="py-3 px-6">
                                        Name
                                    </th>

                                    <th scope="col" class="py-3 px-6">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($categories as $category)
                                    <tr class="border-b border-b-gray-200">

                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $category->name }}
                                        </td>

                                        <td class="py-4 px-6 text-right">
                                            <a href="category/edit-category/{{ $category->id }}"
                                                class="mx-5 font-medium text-emerald-600 hover:underline">
                                                Edit
                                            </a>

                                            <button data-id="{{ $category->id }}" class="font-medium
                                                text-red-600 hover:underline"
                                                onclick="$('#dataid').val($(this).data('id'));
                                                $('#showmodal').modal('show');">Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="pl-5 p-3">
                                            There is no data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-flex-view>

        <div id="showmodal" tabindex="-1" class="hidden">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div>
                    <form action="{{ route('delete-category') }}" method="POST">
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
                                Are you sure you want to delete this category?
                            </h3>

                            <input type="hidden" name="dataid" id="dataid"/>

                            <button data-modal-toggle="popup-modal" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4
                                focus:outline-none focus:ring-red-300 dark:focus:ring-red-800
                                font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5
                                text-center mr-2">
                                Yes, I'm sure
                            </button>

                            <a rel="modal:close"
                                class="cursor-pointer text-gray-500 bg-white hover:bg-gray-100
                                focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border
                                 border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900
                                 focus:z-10"> No, cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            const targetEl = document.getElementById('dropdown-example');
            targetEl.style.display = "block";
        </script>

        @include('includes.jquery')
    </x-body>
@endsection
