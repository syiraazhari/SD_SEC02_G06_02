@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="m-4 w-screen">
                <x-breadcrumbs>
                    Edit Profile
                </x-breadcrumbs>

                <div class="border-b  border-l border-r grid grid-cols-1 lg:grid-cols-6 bg-white shadow-sm">

                    <x-sidebar.sidebar-profile />

                    <div class="lg:col-span-5 m-5 lg:border-l p-5">
                        <div class="text-2xl font-roboto mb-2">
                            Edit Profile
                        </div>

                        <div class="py-3">
                            <div>
                                <form action="{{ route('update_profile') }}" method="POST">
                                    @csrf
                                    <h3 class="text-xl font-bold">General Info</h3>
                                    <div class="flex flex-col my-2">
                                        <div class="grid grid-cols-2 gap-5">
                                            <div>
                                                <label class="text-secondary block font-roboto font-medium"
                                                    for="first_name">First
                                                    Name</label>
                                                <x-input placeholder="First Name" name='first_name'
                                                id='first_name'
                                                    value="{{ $user->first_name }}" />

                                            </div>
                                            <div>
                                                <label class="text-secondary block font-roboto font-medium"
                                                    for="last_name">Last
                                                    Name</label>
                                                <x-input placeholder="Last Name" name='last_name' id='last_name'
                                                    value="{{ $user->last_name }}" />

                                            </div>

                                        </div>

                                        <div>
                                            <div class="my-2">
                                                <label class="text-secondary" for="dob">Birthdate</label>
                                                <x-input type="date" name='dob' id='dob'
                                                    value="{{ $user->birthdate }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <h3 class="text-xl font-bold">Contact Info</h3>
                                        <div class="flex flex-col my-2">
                                            <div class="grid grid-cols-2 gap-5">
                                                <div>
                                                    <label class="text-secondary block font-roboto font-medium"
                                                        for="email">Email Address</label>
                                                    <x-input placeholder="Email Address" type="email"
                                                    name='email' id='email' value="{{ $user->email }}" />

                                                </div>
                                                <div>
                                                    <label class="text-secondary block font-roboto font-medium"
                                                        for="contact_number">Contact Number</label>
                                                    <x-input placeholder="Contact Number" name='contact_number'
                                                        id='contact_number' value="{{ $user->contact_number }}" />

                                                </div>
                                            </div>

                                            <div>
                                                <div class="my-2">
                                                    <label class="text-secondary " for="address">Address</label>
                                                    <textarea name="address" id="address"
                                                        class="block w-full px-4 py-2 mt-2 font-roboto
                                                        text-slate-800 bg-white border border-slate-800
                                                        rounded-md focus:border-slate-800 focus:ring-slate-800
                                                        focus:ring-opacity-80 focus:outline-none focus:ring"
                                                        style="resize: none;">{{ $user->address }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='flex justify-end'>
                                        <button type="submit"
                                            class="ml-3 bg-slate-800 px-3 py-1 rounded-sm text-white
                                            hover:bg-slate-500">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-flex-view>
    </x-body>
@endsection
