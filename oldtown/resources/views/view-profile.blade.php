@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="m-4 w-screen">
                <x-breadcrumbs>
                    View Profile
                </x-breadcrumbs>

                <div class="border-b  border-l border-r grid grid-cols-1 lg:grid-cols-6 bg-white shadow-sm">


                    <x-sidebar.sidebar-profile />

                    <div class="lg:col-span-5 m-5 border-l p-5">
                        @if (session('status'))
                            <div x-transition.opacity x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 1000)"
                                class="block w-full">
                                <x-alert.success>
                                    {{ session('status') }}
                                </x-alert.success>
                            </div>
                        @endif
                        <div class="text-2xl font-roboto mb-2">
                            View Profile
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-6">
                            <div class="flex flex-col items-center py-3 place-self-center col-span-2">
                                <div class="relative">

                                    @if (Auth::user()->profile_images)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_images) }}"
                                            alt="profile_images" class="h-64 rounded-lg relative">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1524024973431-2ad916746881?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Z29hdHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                            alt="" class="h-64 rounded-lg relative">
                                    @endif


                                    <a href="{{ route('edit_image') }}">
                                        <div
                                            class="opacity-0 bg-black rounded-sm hover:opacity-50 duration-300 absolute inset-0 z-10 flex justify-center items-center text-xl text-white font-semibold">
                                            Edit Profile Image</div>
                                    </a>
                                </div>
                                @php
                                    $fullname = Auth::user()->first_name . ' ' . Auth::user()->last_name;
                                @endphp
                                <h4 class="mt-3 font-bold font-poppins text-xl">{{ $fullname }}</h4>
                            </div>

                            <div class="lg:col-span-4 mx-10">
                                <h3 class="text-xl font-bold">General Info</h3>

                                <div class="my-3">
                                    <h4 class="font-medium">Full Name</h4>
                                    @php
                                        $fullname = Auth::user()->first_name . ' ' . Auth::user()->last_name;
                                    @endphp
                                    <h4>{{ $fullname }}</h4>
                                </div>
                                <div class="my-3">
                                    <h4 class="font-medium">Birth</h4>
                                    <h4>{{ Auth::user()->birthdate }}</h4>
                                </div>

                                <h3 class="text-xl font-bold">Contact Info</h3>
                                <div class="my-3">
                                    <h4 class="font-medium">Email Address</h4>
                                    <h4>{{ Auth::user()->email }}</h4>
                                </div>
                                <div class="my-3">
                                    <h4 class="font-medium">Phone Number</h4>
                                    <h4>{{ Auth::user()->contact_number }}</h4>
                                </div>
                                <div class="my-3">
                                    <h4 class="font-medium">Address</h4>
                                    <h4>{{ Auth::user()->address }}</h4>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </x-flex-view>

    </x-body>
@endsection
