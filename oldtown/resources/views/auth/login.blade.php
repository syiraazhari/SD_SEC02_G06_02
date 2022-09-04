@extends('layouts.app')

@section('content')
    <x-body class="overflow-hidden">

        <x-form-auth.flex class="h-screen">

            <x-form-auth.card-auth>

                <x-form-auth.auth-title title="LOGIN" subtitle="OldTown White Coffee" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <x-form-auth.flex class="flex-col">

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

                            <label class="mt-5 block text-secondary font-roboto font-medium" for="password">Password</label>
                            <x-input-password placeholder="Insert Password" id="password" name="password" />
                            <div class="text-right">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="label-text-alt text-gray-500 hover:underline">Forgot
                                        Password</a>
                                @endif

                            </div>
                        </x-form-auth.form-class>

                        <x-button type="submit">
                            login
                        </x-button>

                    </x-form-auth.flex>
                </form>
            </x-form-auth.card-auth>

        </x-form-auth.flex>
    </x-body>
@endsection
