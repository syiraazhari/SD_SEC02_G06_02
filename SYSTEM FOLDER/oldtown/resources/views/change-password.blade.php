@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="m-4 w-screen">
                <x-breadcrumbs>
                    Edit Password
                </x-breadcrumbs>

                <div class="border-b  border-l border-r grid grid-cols-1 lg:grid-cols-6 bg-white shadow-sm">

                    <x-sidebar.sidebar-profile />

                    <div class="lg:col-span-5 m-5 lg:border-l p-5">
                        <div class="w-">
                            @if (session('error'))
                                <x-alert.error>
                                    {{ session('error') }}
                                </x-alert.error>
                            @endif
                            @if ($errors->any())
                                <x-alert.error>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }} <br>
                                    @endforeach
                                </x-alert.error>
                            @endif
                        </div>

                        <div class="text-2xl font-roboto mb-2">
                            Edit Password
                        </div>

                        <div>
                            <div class="flex flex-col my-2 w-2/4">
                                <form action="{{ route('edit_password') }}" method="POST">
                                    @csrf
                                    <div class="my-2">
                                        <label class="text-secondary " for="old_password">Old Password</label>
                                        <x-input-password placeholder="Insert Old Password" id="old_password"
                                            name="old_password" required />
                                    </div>

                                    <div class="my-2">
                                        <label class="text-secondary " for="password">New Password</label>
                                        <x-input-password placeholder="New Password" id="password"
                                        name="password" required />
                                    </div>

                                    <div class="my-2">
                                        <label class="text-secondary " for="password_confirmation">Confirm
                                            Password</label>
                                        <x-input-password placeholder="Confirm Password"
                                        id="password_confirmation" name="password_confirmation" required />
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
