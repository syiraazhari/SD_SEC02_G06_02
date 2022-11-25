@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="md:m-10 m-5 flex-grow">
                <div class="flex items-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-10 w-10 p-2 text-primary rounded-full border border-secondary-600"
                         width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2
                        -2h-2"></path>
                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                        <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5"></path>
                        <path d="M12 17v1m0 -8v1"></path>
                    </svg>

                    <h4 class="px-5 text-2xl">Report</h4>
                </div>
                <x-breadcrumbs-text Title="Report" subtitle="Generate Report" />

                <div class="my-5">
                    <a href="/report"
                        class="px-5 py-2 rounded-sm font-poppins capitalize shadow-md bg-primary
                        hover:bg-yellow-200">
                        Back To Report
                    </a>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alert.error>
                            {{ $error }}
                        </x-alert.error>
                    @endforeach
                @endif

                <div class="py-5">
                    <div class="bg-white p-3 rounded-lg flex flex-col drop-shadow-md border">
                        <h1 class="text-2xl">Generate Daily Report</h1>
                        <div class="self-end">
                            <form action="{{ route('generate-daily-report') }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-secondary-600 rounded-lg text-white p-3">
                                    Generate
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="py-5">
                    <div class="bg-white p-3 rounded-lg flex flex-col drop-shadow-md border">
                        <h1 class="text-2xl">Generate Monthly Report</h1>
                        <div class="self-end">
                            <form action="{{route('generate-monthly-report')}}">
                            <div>
                                <button class="bg-secondary-600 rounded-lg text-white p-2.5">Generate</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </x-flex-view>
        @include('includes.jquery')
    </x-body>
@endsection
