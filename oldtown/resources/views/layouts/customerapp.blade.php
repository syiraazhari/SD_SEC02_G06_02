<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>OldTown White Coffee</title>

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>

    @livewireStyles
</head>

<body class="bg-white">
    <nav x-cloak x-data="{ showCart: false }" x-transition>
        <div class="flex justify-between py-5 px-7 bg-primary">
            <a href="/">
                <img src="{{ asset('storage/images/logo.svg') }}" alt="logo">
            </a>

            <button x-on:click="showCart = !showCart"
                class="font-seoulHangang text-secondary flex rounded-2xl px-3 bg-white items-center drop-shadow-md shadow-secondary-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart"
                    width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="6" cy="19" r="2"></circle>
                    <circle cx="17" cy="19" r="2"></circle>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                </svg>
                <span class="mx-2">Cart {{ $total }}</span>
            </button>
        </div>

        <div x-show="showCart" @click.outside="showCart = !showCart" x-transition
            class="fixed z-20 overflow-auto top-0 right-0 w-screen h-screen bg-white md:w-2/3 lg:w-1/3">
            <div>
                <div class="flex justify-around">
                    <h1 class="flex-grow text-left p-5 font-seoulHangang text-2xl">Checkout</h1>
                    <button x-on:click="showCart = !showCart" class="m-5 px-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div>
                    @livewire('customer.cart-component')
                </div>

            </div>

        </div>
    </nav>


    <main>
        {{ $slot }}
    </main>

    <footer class="bg-primary">
        <div class="container mx-auto px-10 py-5 font-RobotoSlab">
            <h3 class="text-center">OldTown White Coffee</h3>
            <hr class="border-secondary-600 my-3">
            <div class="flex justify-between">
                <div>
                    <h3>Follow Us</h3>
                    <div class="flex">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                                <circle cx="12" cy="12" r="3"></circle>
                                <line x1="16.5" y1="7.5" x2="16.5" y2="7.501"></line>
                            </svg>
                        </a>

                        <a href="" class="mx-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="flex flex-col">
                    <a href="/">Home</a>
                    <a href="/contact-us">Contact Us</a>
                    <a href="/about-us">About Us</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>


</html>
