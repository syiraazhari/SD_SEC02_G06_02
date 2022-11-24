@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="md:m-10 m-5 flex-grow">
                <div class="flex items-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-10 w-10 p-2 text-primary rounded-full border border-secondary-600" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                        <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                        <path d="M12 17v1m0 -8v1"></path>
                    </svg>

                    <h4 class="px-5 text-2xl">Report</h4>
                </div>
                <x-breadcrumbs-text Title="Report" subtitle="Report" />

                @if (session('status'))
                    <div x-transition.opacity x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 1000)">
                        <x-alert.success>
                            {{ session('status') }}
                        </x-alert.success>
                    </div>
                @endif

                <div class="bg-white p-3">

                    <div class="flex justify-end mb-5">
                        <div class="flex items-center mx-3">
                            <a href="report/generate-report"
                                class="px-5 py-2 block rounded-sm font-poppins capitalize shadow-md bg-primary hover:bg-yellow-200">
                                Generate Report
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto relative border shadow-md sm:rounded-lg mx-3">
                        <table class="w-2/3 text-sm text-left text-gray-500 m-5 border">
                            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                                Reports
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">List of Created Reports
                                </p>
                            </caption>

                            <thead class="text-xs text-gray-700 uppercase bg-background">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        No
                                    </th>

                                    <th scope="col" class="py-3 px-6">
                                        Generated By
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Total Sales
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Total Cost
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Total Profits
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Type
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Date
                                    </th>

                                    <th scope="col" class="py-3 px-6">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($report as $name)
                                    <tr class="border-b border-b-gray-200">

                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                            {{ ++$loop->index }}
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $name->generated_by }}
                                        </th>
                                        <td class="py-4 px-6">
                                            RM {{ $name->sales }}
                                        </td>
                                        <td class="py-4 px-6">
                                            RM {{ $name->cost }}
                                        </td>
                                        <td class="py-4 px-6">
                                            RM {{ $name->profit }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $name->type }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $name->report_date }}
                                        </td>

                                        <td class="py-4 px-6 text-right">
                                            <form action="/download-report" class="inline" method="get">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $name->id }}">
                                                <button type="submit"
                                                    class="mx-5 font-medium text-emerald-600 hover:underline">
                                                    Download
                                                </button>
                                            </form>

                                            <button data-id="{{ $name->id }}"
                                                class="font-medium text-red-600 hover:underline"
                                                onclick="$('#dataid').val($(this).data('id'));
                                                $('#showmodal').modal('show');">
                                                Delete
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
                    <form action="{{ route('delete-report') }}" method="POST">
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
                                Are you sure you want to delete this report?</h3>

                            <input type="hidden" name="dataid" id="dataid" value="" />

                            <button data-modal-toggle="popup-modal" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4
                                focus:outline-none focus:ring-red-300 font-medium
                                rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>

                            <a rel="modal:close"
                                class="cursor-pointer text-gray-500 bg-white hover:bg-gray-100 focus:ring-4
                                 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200
                                 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
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
