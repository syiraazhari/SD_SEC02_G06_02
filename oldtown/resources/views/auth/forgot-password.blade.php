<!DOCTYPE html>
<html lang="en">

<head>
    @include('component.header')
    <title>Forgot Password</title>
</head>

<body class="overflow-hidden bg-background">
    <div class="flex justify-center items-center h-screen mx-5">
        <div class="flex flex-col items-center w-screen rounded-lg shadow-lg bg-white p-5 md:w-800">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="p-5 mx-5 block">
                    <h3 class="font-RobotoSlab font-bold text-lg border-b border-secondary p-5">OldTown White Coffee</h3>
                    <span class="text-center block font-Roboto py-2">Forgot Password</span>
                </div>
                <div>
                    <div class="w-full text-center">
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>
                    <div class="flex flex-col mt-5">
                        <div class="form-control w-full md:w-screen max-w-xs">
                            <label class="label" for="email">
                                <span class="font-Roboto text-blackie">Email Adress</span>
                            </label>
                            <input type="email" name="email" id="email" placeholder="Your Email Address"
                                class="input input-primary w-full max-w-xs" />
                        </div>
                        <button type="submit" class="btn btn-primary my-5">
                            Reset Your Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>




{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf




            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Emaidl Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
