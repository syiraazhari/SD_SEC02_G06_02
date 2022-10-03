@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />
            <div class="md:m-10 m-5 flex-grow">
                <div>
                    <h3 class="text-2xl font-poppins">Add Staff</h3>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alert.error>
                            {{ $error }}
                        </x-alert.error>
                    @endforeach
                @endif

                <form action="{{ route('add-staff') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid md:grid-cols-3 grid-cols-1 bg-white my-3 rounded-sm border">

                        <div class="place-self-center py-3">

                            <img src="{{ asset('storage/oldtownlogo.png') }}" alt="profile_images"
                                class="img-preview max-h-72 rounded-lg">

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
                                    <x-input placeholder="First Name" name='first_name' id='first_name' required />

                                </div>
                                <div>
                                    <label class="text-secondary block font-roboto font-medium" for="last_name">Last
                                        Name</label>
                                    <x-input placeholder="Last Name" name='last_name' id='last_name' required />
                                </div>
                            </div>

                            <div>
                                <div class="my-2">
                                    <label class="text-secondary" for="birthdate">Birthdate</label>
                                    <x-input type="date" name='birthdate' id='birthdate' required />
                                </div>
                            </div>

                            <div class="my-3">
                                <label class="text-secondary block font-roboto font-medium" for="email">Email
                                    Address</label>
                                <x-input placeholder="Email Address" type="email" name='email' id='email'
                                    required />

                            </div>

                            <div>
                                <label class="text-secondary block font-roboto font-medium" for="contact_number">Contact
                                    Number</label>
                                <x-input placeholder="Contact Number" name='contact_number' id='contact_number' required />

                            </div>

                            <div class="my-2">
                                <label class="text-secondary " for="address">Address</label>
                                <textarea name="address" id="address"
                                    class="block w-full px-4 py-2 mt-2 font-roboto text-slate-800 bg-white border border-slate-800 rounded-md focus:border-slate-800 focus:ring-slate-800  focus:ring-opacity-80 focus:outline-none focus:ring"
                                    style="resize: none;" required></textarea>
                            </div>

                            <div class='flex justify-end my-3'>
                                <a href="{{ route('view-staff') }}"
                                    class="px-5 py-2 block rounded-sm font-poppins capitalize shadow-md text-red-800 bg-red-500 hover:bg-red-600">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="ml-3 font-poppins px-3 py-1 rounded-sm bg-primary hover:bg-yellow-200">
                                    Add New Staff
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
