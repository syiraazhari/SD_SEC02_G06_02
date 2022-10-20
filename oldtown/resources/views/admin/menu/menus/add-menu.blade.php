@extends('layouts.app')

@section('content')
    <x-body>

        <x-navigation />
        <x-flex-view>
            <x-sidebar.sidebar />
            <div class="md:m-10 m-5 flex-grow">
                <div>
                    <h3 class="text-2xl font-poppins">Add Menu</h3>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alert.error>
                            {{ $error }}
                        </x-alert.error>
                    @endforeach
                @endif

                <form action="{{ route('add-menu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid md:grid-cols-3 grid-cols-1 bg-white my-3 rounded-sm border">

                        <div class="place-self-center py-3">

                            <img src="{{ asset('storage/oldtownlogo.png') }}" alt="profile_images"
                                class="img-preview max-h-72 rounded-lg">

                        </div>

                        <div class="col-span-2 border-l px-5">
                            <div class="my-3">
                                <label for="image">Menu Image</label>
                                <br>
                                <input
                                    class="block text-sm text-gray-500 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none
                                @error('image') border-red-500 text-red-500 bg-red-300 @enderror"
                                    id="image" type="file" onchange="previewImage()" name="menu_images">
                                <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPG or JPEG
                                    (Max: 5048kb)
                                </p>
                                @error('image')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <div class="my-2">
                                    <label class="text-secondary" for="menu_name">Menu Name</label>
                                    <x-input type="text" placeholder="Insert Menu Name" name='menu_name' id='menu_name'
                                        required />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-5 mb-3">
                                <div>
                                    <label class="text-secondary block font-roboto font-medium" for="cost_price">Cost
                                        Price</label>
                                    <x-input placeholder="Cost of Price" name='cost_price' id='cost_price' max="100"
                                        required />

                                </div>
                                <div>
                                    <label class="text-secondary block font-roboto font-medium" for="selling_price">Selling
                                        Price</label>
                                    <x-input placeholder="Selling Price" name='selling_price' id='selling_price'
                                        max="100" required />
                                </div>
                            </div>

                            <div>
                                <label class="text-secondary block font-roboto font-medium" for="category">Category</label>

                                <select id="category_id" name="category_id"
                                    class="block w-full px-4 py-2 mt-2 font-roboto text-slate-800 bg-white border border-slate-800 rounded-md focus:border-slate-800 focus:ring-slate-800  focus:ring-opacity-80 focus:outline-none focus:ring">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="my-2">
                                <label class="text-secondary " for="description">Description</label>
                                <textarea name="description" id="description" maxlength="70"
                                    class="block w-full px-4 py-2 mt-2 font-roboto text-slate-800 bg-white border border-slate-800 rounded-md focus:border-slate-800 focus:ring-slate-800  focus:ring-opacity-80 focus:outline-none focus:ring"
                                    style="resize: none;" required></textarea>
                            </div>

                            <div class='flex justify-end my-3'>
                                <a href="{{ route('menu-view') }}"
                                    class="px-5 py-2 block rounded-sm font-poppins capitalize shadow-md text-red-800 bg-red-500 hover:bg-red-600">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="ml-3 font-poppins px-3 py-1 rounded-sm bg-primary hover:bg-yellow-200">
                                    Add New Menu
                                </button>
                            </div>
                </form>
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
