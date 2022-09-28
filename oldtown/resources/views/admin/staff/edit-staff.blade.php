@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />
            <div class="md:m-10 m-5 flex-grow">
                <div>
                    @foreach ($staff as $staff)
                        <h3 class="text-2xl font-poppins">Edit Staff: <span
                                class="
                        font-bold">{{ $staff->first_name . ' ' . $staff->last_name }}</span>
                        </h3>
                </div>

                <form action="{{ route('update-staff', $staff->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid md:grid-cols-3 grid-cols-1 bg-white my-3 rounded-sm border">

                        <div class="place-self-center py-3">
                            <input type="hidden" name="oldImage" value="{{ $staff->profile_images }}">

                            @if ($staff->profile_images)
                                <img src="{{ asset('storage/' . $staff->profile_images) }}" alt="profile_images"
                                    class="img-preview max-h-72 rounded-lg">
                            @else
                                <img src="{{ asset('storage/oldtownlogo.png') }}" alt="profile_images"
                                    class="img-preview max-h-72 rounded-lg">
                            @endif
                        </div>

                        <div class="col-span-2 border-l px-5">
                            <div class="my-3">
                                <label for="image">Profile Image</label>
                                <br>
                                <input
                                    class="block text-sm text-gray-500 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none
                                @error('image') border-red-500 text-red-500 bg-red-300 @enderror"
                                    id="image" type="file" onchange="previewImage()" name="image">
                                <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPG or JPEG
                                    (Max: 5048kb)
                                </p>
                                @error('image')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-2 gap-5">
                                <div>
                                    <label class="text-secondary block font-roboto font-medium" for="first_name">First
                                        Name</label>
                                    <x-input placeholder="First Name" name='first_name' id='first_name'
                                        value="{{ $staff->first_name }}" />

                                </div>
                                <div>
                                    <label class="text-secondary block font-roboto font-medium" for="last_name">Last
                                        Name</label>
                                    <x-input placeholder="Last Name" name='last_name' id='last_name'
                                        value="{{ $staff->last_name }}" />
                                </div>
                            </div>

                            <div>
                                <div class="my-2">
                                    <label class="text-secondary" for="birthdate">Birthdate</label>
                                    <x-input type="date" name='birthdate' id='birthdate'
                                        value="{{ $staff->birthdate }}" />
                                </div>
                            </div>

                            <div class="my-3">
                                <label class="text-secondary block font-roboto font-medium" for="email">Email
                                    Address</label>
                                <x-input placeholder="Email Address" type="email" name='email' id='email'
                                    value="{{ $staff->email }}" />

                            </div>

                            <div>
                                <label class="text-secondary block font-roboto font-medium" for="contact_number">Contact
                                    Number</label>
                                <x-input placeholder="Contact Number" name='contact_number' id='contact_number'
                                    value="{{ $staff->contact_number }}" />

                            </div>

                            <div class="my-2">
                                <label class="text-secondary " for="address">Address</label>
                                <textarea name="address" id="address"
                                    class="block w-full px-4 py-2 mt-2 font-roboto text-slate-800 bg-white border border-slate-800 rounded-md focus:border-slate-800 focus:ring-slate-800  focus:ring-opacity-80 focus:outline-none focus:ring"
                                    style="resize: none;">{{ $staff->address }}</textarea>
                            </div>
                            @endforeach
                            <div class='flex justify-end my-3'>
                                <a href="{{ route('view-staff') }}"
                                    class="px-5 py-2 block rounded-sm font-poppins capitalize shadow-md text-red-800 bg-red-500 hover:bg-red-600">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="ml-3 font-poppins px-3 py-1 rounded-sm bg-primary hover:bg-yellow-200">
                                    Save Staff Profile
                                </button>
                            </div>

                </form>
            </div>
            </div>
            </div>
        </x-flex-view>

        <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
    </x-body>
@endsection
