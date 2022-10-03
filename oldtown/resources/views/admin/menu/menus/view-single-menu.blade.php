@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />
            <div class="md:m-10 m-5 flex-grow">
                <div class="mb-5">
                    <a href="{{ route('menu-view') }}"
                        class="px-5 py-2 rounded-sm font-poppins capitalize shadow-md bg-primary hover:bg-yellow-200">
                        Back To View
                    </a>
                </div>
                @foreach ($menus as $menu)
                    <div class="bg-white border">
                        <div class="flex flex-col py-3 items-center justify-center border">
                            @if ($menu->menu_images)
                                <img src="https://via.placeholder.com/800x600.png/{{ $menu->menu_images }}"
                                    alt="profile_images" class="h-64 my-5 rounded-lg">
                            @else
                                <img src="{{ asset('storage/oldtownlogo.png') }}" alt="profile_images"
                                    class="h-64 my-5 rounded-lg">
                            @endif
                        </div>
                        <div class="grid border border-t-0 grid-cols-2 text-center font-poppins">
                            <div class="border-b border-r py-2 font-bold">Menu Name</div>
                            <div class="border-b py-2 font-bold">{{ $menu->menu_name }}</div>
                            <div class="border-b border-r py-2">Cost Price:</div>
                            <div class="border-b py-2">{{ $menu->cost_price }}</div>
                            <div class="border-b border-r py-2">Selling Price</div>
                            <div class="border-b py-2">{{ $menu->selling_price }}</div>
                            <div class="border-b border-r py-2">Categories</div>
                            <div class="border-b py-2">{{ $menu->category->name }}</div>
                            <div class="border-b border-r py-2">Description</div>
                            <div class="border-b py-2 px-3">{{ $menu->description }}</div>
                            <div class="border-b border-r py-2">Created At</div>
                            <div class="border-b py-2">{{ $menu->created_at }}</div>
                            <div class="border-b border-r py-2">Updated At</div>
                            <div class="border-b py-2">{{ $menu->updated_at }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-flex-view>

    </x-body>
@endsection
