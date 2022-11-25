<x-guest-layout>
    <div>
        <main class="container mx-auto h-screen mb-10 font-seoulHangang">
            <section class="m-3">
                <h3 class="text-xl">Categories</h3>
            </section>

            <section class="my-3">
                <div class="text-base ml-3">
                    <ul class="flex flex-wrap text-sm font-medium">
                        @forelse ($categories as $category)
                            <li class="mr-2">
                                <a href="{{ $category->id }}"
                                    class="bg-white rounded-full border inline-block my-3
                                    border-gray-300 drop-shadow-md p-2 px-5
                                    {{ request()->is('view-menu/' . "$category->id") ? 'bg-primary' : '' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </section>

            <section class="m-3">

                @if ($nameCategory != null )
                    <h3 class="text-xl">{{ $nameCategory->name }} - Just For You</h3>
                @endif

                <div class="my-5 grid grid-cols-2 gap-5 px-5 place-items-stretch">
                    @forelse ($menus as $menu)
                        <a href="menu/{{ $menu->id }}">
                            <div class="flex flex-col items-center bg-white rounded-md border p-5 shadow-lg">
                                <img src="{{ asset('storage/' . $menu->menu_images) }}" alt="menu images"
                                    class="max-h-36">
                                <h3>{{ $menu->menu_name }}</h3>
                            </div>
                        </a>
                    @empty
                        <p>Sorry, Currently There is no menu</p>
                    @endforelse
                </div>
            </section>
        </main>
    </div>
</x-guest-layout>
