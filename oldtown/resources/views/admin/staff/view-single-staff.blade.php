@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />
            <div class="md:m-10 m-5 flex-grow">
                <div class="mb-5">
                    <a href="{{ route('view-staff') }}"
                        class="px-5 py-2 rounded-sm font-poppins capitalize shadow-md bg-primary hover:bg-yellow-200">
                        Back To View
                    </a>
                </div>
                @foreach ($staff as $staff)
                    <div class="bg-white border">
                        <div class="flex flex-col py-3 items-center justify-center border">
                            @if ($staff->profile_images)
                                <img src="{{ asset('storage/' . $staff->profile_images) }}" alt="profile_images"
                                    class="h-64 my-5 rounded-lg">
                            @else
                                <img src="{{ asset('storage/oldtownlogo.png') }}" alt="profile_images"
                                    class="h-64 my-5 rounded-lg">
                            @endif
                        </div>
                        <div class="grid border border-t-0 grid-cols-2 text-center font-poppins">
                            <div class="border-b border-r py-2 font-bold">Name</div>
                            <div class="border-b py-2 font-bold">{{ $staff->first_name . ' ' . $staff->last_name }}</div>
                            <div class="border-b border-r py-2">Birthdate</div>
                            <div class="border-b py-2">{{ $staff->birthdate }}</div>
                            <div class="border-b border-r py-2">Contact Number</div>
                            <div class="border-b py-2">{{ $staff->contact_number }}</div>
                            <div class="border-b border-r py-2">Address</div>
                            <div class="border-b py-2 px-3">{{ $staff->address }}</div>
                            <div class="border-b border-r py-2">Created At</div>
                            <div class="border-b py-2">{{ $staff->created_at }}</div>
                            <div class="border-b border-r py-2">Updated At</div>
                            <div class="border-b py-2">{{ $staff->updated_at }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-flex-view>

    </x-body>
@endsection
