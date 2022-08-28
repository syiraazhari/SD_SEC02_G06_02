<!DOCTYPE html>
<html lang="en">

<head>
    @include('component.header')
    <title>OldTown Login</title>
</head>

<body class="overflow-hidden bg-background">
    <div class="flex justify-center items-center h-screen mx-5">
        <div class="flex flex-col items-center w-screen rounded-lg shadow-lg bg-white p-5 md:w-800">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="p-5 border-b border-secondary mx-5 block">
                    <h3 class="font-RobotoSlab font-bold text-lg">OldTown White Coffee</h3>
                </div>
                <div class="mt-5">
                    @if (session('status'))
                        <div x-transition.opacity x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 1000)"
                            class="border border-success text-success p-3 my-3">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="border w-full p-3 text-center border-error text-error">
                                {{ $error }}
                            </div>
                        @endforeach

                    @endif

                    <div>
                        <div class="form-control w-full md:w-screen max-w-xs">
                            <label class="label" for="email">
                                <span class="font-Roboto text-blackie">Email Adress</span>
                            </label>
                            <input type="email" placeholder="Email" id="email"
                                class="input input-primary w-full max-w-xs"name="email" :value="old('email')"
                                required />
                        </div>
                        <div class="form-control w-full max-w-xs">
                            <label class="label">
                                <span class="font-Roboto text-blackie" for="password">Password</span>
                            </label>
                            <div class="py-2" x-data="{ show: true }">
                                <div class="relative">
                                    <input :type="show ? 'password' : 'text'" type="text" placeholder="Type here"
                                        class="input input-primary w-full max-w-xs" name="password" required />

                                    {{-- show password --}}
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                                        <svg class="h-5 text-secondary" fill="none" @click="show = !show"
                                            :class="{ 'hidden': !show, 'block': show }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                        </svg>

                                        <svg class="h-5 text-secondary" fill="none" @click="show = !show"
                                            :class="{ 'block': !show, 'hidden': show }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <label class="label text-end block">
                                @if (Route::has('password.request'))
                                    <a class="label-text-alt hover:underline" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </label>

                            <button class="btn btn-primary my-5">
                                LOGIN
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
