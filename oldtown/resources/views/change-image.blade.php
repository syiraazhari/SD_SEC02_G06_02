@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />

            <div class="m-4 w-screen">
                <x-breadcrumbs>
                    Change Profile Image
                </x-breadcrumbs>

                <div class="border-b  border-l border-r grid grid-cols-1 lg:grid-cols-6 bg-white shadow-sm">

                    <x-sidebar.sidebar-profile />

                    <div class="lg:col-span-5 m-5 lg:border-l p-5">
                        <div class="text-2xl font-roboto mb-2">
                            Profile Image
                        </div>


                        <div class="py-3">
                            <div class="flex flex-col my-2 w-2/4">
                                <form action="{{ route('update_image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 w-96 relative">

                                        <input type="hidden" name="oldImage" value="{{ Auth::user()->profile_images }}">

                                        @if (Auth::user()->profile_images)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_images) }}"
                                                alt="profile_images" class="h-64 rounded-lg relative img-preview">
                                        @else
                                            <img class="img-preview max-h-56 rounded-lg">
                                        @endif

                                        <div class="my-3">
                                            <br>
                                            <input
                                                class="block w-full text-sm text-gray-500 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none
                                                @error('image') border-red-500 text-red-500 bg-red-300 @enderror"
                                                id="image" type="file" onchange="previewImage()" name="image">
                                            <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPG or JPEG
                                                (Max: 5048kb)</p>
                                            @error('image')
                                                <p class="text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class='flex justify-end w-full'>
                                            <button type="submit"
                                                class="ml-3 bg-slate-800 px-3 py-1 rounded-sm text-white hover:bg-secondary-500">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
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
