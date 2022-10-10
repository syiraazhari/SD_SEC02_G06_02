@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="md:m-10 m-5 flex-grow">
                <div class="flex items-center">
                    <svg class="h-10 w-10 p-2 text-primary rounded-full border border-secondary-600"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                    <h4 class="px-5 text-2xl">Menu</h4>
                </div>
                <x-breadcrumbs-text Title="Category" subtitle="Add Category" />

                <div class="my-5">
                    <a href="{{ route('category-view') }}"
                        class="px-5 py-2 rounded-sm font-poppins capitalize shadow-md bg-primary hover:bg-yellow-200">
                        Back To View
                    </a>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alert.error>
                            {{ $error }}
                        </x-alert.error>
                    @endforeach
                @endif

                <div class="bg-white">
                    <form action="{{route('add-category')}}" method="POST">
                        @csrf
                        <div class="flex items-center mb-5 p-5">
                            <div class="w-1/2">

                                    <input placeholder="category" name='category' class="block w-full px-5 py-2 mt-2 font-roboto text-secondary-600 bg-white border border-secondary-500 focus:border-secondary-600 focus:ring-secondary-600  focus:ring-opacity-80 focus:outline-none focus:ring">
                            </div>

                            <button type="submit" class="px-5 py-2.5 mt-2 mx-5 font-poppins capitalize shadow-md bg-primary hover:bg-yellow-200" >
                                add new category
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </x-flex-view>

        <script>

            const targetEl = document.getElementById('dropdown-example');
            targetEl.style.display = "block";

        </script>

    </x-body>
@endsection
