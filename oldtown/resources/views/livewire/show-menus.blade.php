<div>
    <div class="flex justify-between">
        <div class="mx-3 w-1/3">
            <div class="relative">
                <div class="flex absolute inset-y-0 right-3 items-center pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-secondary-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" wire:model="term"
                    class="block py-3 w-full text-sm text-secondary-600 bg-gray-50 rounded-lg border border-secondary-600 focus:ring-secondary-500 focus:border-secondary-500"
                    placeholder="Search Menus..">
            </div>
        </div>

        @if (Auth::user()->role === 'admin')
            <div class="flex items-center mx-3">
                <a href="{{ route('add-menu') }}"
                    class="px-5 py-2 block rounded-sm font-poppins capitalize shadow-md bg-primary hover:bg-yellow-200">
                    add new menu
                </a>
            </div>
        @endif
    </div>


    <div class="my-5 mx-3 overflow-x-auto relative border shadow-sm sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                Menus
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">List of Menu
                </p>
            </caption>

            <thead class="text-xs text-gray-700 uppercase bg-background">

                <tr>
                    <th scope="col" class="py-3 px-6">
                        Menu Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Cost Price
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Category
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Selling Price
                    </th>
                    <th scope="col" class="sr-only">
                        Action
                    </th>
                </tr>

            </thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr class="bg-white border-b">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            {{ $menu->menu_name }}
                        </th>

                        <td class="py-4 px-6">
                            {{ $menu->cost_price }}
                        </td>

                        <td class="py-4 px-6">
                            {{ $menu->category->name }}
                        </td>

                        <td class="py-4 px-6">
                            {{ $menu->selling_price }}
                        </td>

                        <td class="py-4 px-6">
                            <a href="{{ route('view-single-menu', $menu->id) }}"
                                class="font-medium text-blue-600 hover:underline">View</a>

                            @if (Auth::user()->role === 'admin')
                                <a href="edit-menu/{{ $menu->id }}"
                                    class="mx-5 font-medium text-emerald-600 hover:underline">Edit</a>
                                <button data-id="{{ $menu->id }},{{ $menu->menu_images }}"
                                    class="font-medium text-red-600 hover:underline"
                                    onclick="$('#dataid').val($(this).data('id')); $('#showmodal').modal('show');">Delete
                                </button>
                            @endif
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4"  class="pt-5 text-center">
                            There is no data
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        <div class="m-5">
            {{ $menus->links() }}
        </div>

    </div>
</div>
