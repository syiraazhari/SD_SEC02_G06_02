@extends('layouts.app')

@section('content')
    <x-body class="overflow-hidden">

        <x-form-auth.flex class="h-screen">

            <x-form-auth.card-auth>

                <x-form-auth.auth-title title="Reset Password" subtitle="OldTown White Coffee" />

                <x-form-auth.flex class="flex-col">
                    <form method="POST" action="{{ route('password.update') }}" class="w-full flex items-center flex-col">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
                            <input type="email" value="{{ $request->email }}" name="email"
                                class="border block w-full rounded-sm border-gray-400 bg-gray-100 text-gray-400 text-center"
                                readonly>

                            <label class="mt-2 block text-secondary font-roboto font-medium" for="password">Password</label>
                            <x-input-password placeholder="Insert Password" id="password" type="password" name="password"
                                required />

                            <label class="block text-secondary font-roboto font-medium" for="password_confirmation">Confirm
                                Password</label>
                            <x-input-password placeholder="Insert Password" id="password" type="password"
                                name="password_confirmation" required />
                        </x-form-auth.form-class>

                        <x-button type="submit">
                            Reset Password
                        </x-button>

                    </form>
                </x-form-auth.flex>

            </x-form-auth.card-auth>

        </x-form-auth.flex>
    </x-body>
@endsection
