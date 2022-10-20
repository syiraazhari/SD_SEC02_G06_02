@extends('layouts.app')

@section('content')
    <body class="bg-white">

        @livewire('navbar')

        <main class="container mx-auto h-screen md:mb-10 font-seoulHangang">
            <a href="/view-menu/{{$menu->category_id}}">
                <span>
                    <svg class="w-6 h-6 m-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </span>
            </a>

            <section class="p-3 flex items-center flex-col">

                <img src="{{ asset('storage/' . $menu->menu_images) }}" alt="" class="md:h-96">

                <div class="p-3">
                    <div class="flex justify-between text-2xl my-5">
                        <h3>{{$menu->menu_name}}</h3>
                        <h3>RM {{$menu->selling_price}}</h3>
                    </div>
                    <div>
                        <p class="text-justify">{{$menu->description}}</p>
                    </div>

                    <div class="my-5 flex justify-between">
                        <div class="border inline-flex mr-3 px-3 py-2 rounded-lg shadow-md">
                            <button class="border-r px-3">+
                            </button>
                            <h4 class="px-5">3</h4>
                            <button class="border-l px-3">
                                -
                            </button>
                        </div>

                        <button class="bg-primary px-5 shadow-md rounded-md">
                            Add To Cart
                        </button>

                    </div>

                </div>
            </section>
        </main>


        @livewire('footer')

        @include('includes.jquery')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

    <body>
@endsection
