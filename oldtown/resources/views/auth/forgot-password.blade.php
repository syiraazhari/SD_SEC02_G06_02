@extends('layouts.app')

@section('content')
    <x-body>

        <x-form-auth.flex class="h-screen">

            <x-form-auth.card-auth>

                <x-form-auth.auth-title title="Forgot Password" subtitle="OldTown White Coffee" />

                <x-form-auth.flex class="flex-col w-full">
                    <form method="POST" action="{{ route('password.email') }}" class="w-full flex items-center flex-col">
                        @csrf

                        @if (session('status'))
                            <div x-transition.opacity x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 1000)"
                                class="alert alert-success rounded-sm shadow-sm">
                                <x-alert.success>
                                    {{ session('status') }}
                                </x-alert.success>
                            </div>
                        @endif

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <x-alert.error>
                                    {{ $error }}
                                </x-alert.error>
                            @endforeach
                        @endif

                        <x-form-auth.form-class>
                            <label class="text-secondary block font-roboto font-medium" for="email">Email Address</label>
                            <x-input placeholder="Insert Email Address" name='email' id='email' />

                        </x-form-auth.form-class>
                        <x-button type="submit" class="px-5">
                            reset password
                        </x-button>
                        <a href="{{ route('login') }}">
                            <div class=" hover:underline text-center text-gray-500 mt-5">
                                Back to Login
                            </div>
                        </a>
                    </form>
                </x-form-auth.flex>

            </x-form-auth.card-auth>

        </x-form-auth.flex>
    </x-body>
@endsection
