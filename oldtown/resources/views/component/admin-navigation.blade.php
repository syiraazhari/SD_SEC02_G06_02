<div x-data="{ isOpen: false }" class="flex flex-col">
    <div class="bg-secondary">
        <div class="flex justify-end items-center">

            <!-- Dropdown profile -->
            <div>
                <div class="flex justify-center lg:mr-10">
                    <div x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close()
                            }

                            this.$refs.button.focus()

                            this.open = true
                        },
                        close(focusAfter) {
                            if (!this.open) return

                            this.open = false

                            focusAfter && focusAfter.focus()
                        }
                    }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
                        class="relative">
                        <!-- Button -->
                        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')" type="button"
                            class="flex items-center gap-2 mr-5 px-5 py-2.5 text-white text-lg font-regular font-Roboto">
                            <div>{{ Auth::user()->name }}</div>

                            <!-- Heroicon: chevron-down -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Panel -->
                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                            x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;"
                            class="border-b absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">
                            <a href="{{ route('admin_profile') }}"
                                class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-100 disabled:text-gray-500">
                                Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-100 disabled:text-gray-500">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hamburger Menu -->
            <button @click="isOpen = !isOpen" class="lg:hidden text-white mr-10" @click="isOpen = !isOpen">
                <i class=" fa-solid fa-bars"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="lg:hidden" x-show="isOpen" x-transition>
        <div class="flex flex-col bg-primary pt-5">
            <a href="" class="text-white font-Roboto text-lg m-3 p-3 bg-secondary rounded-lg">
                <i class="fa-solid fa-house px-3"></i>
                Dashboard
            </a>
            <a href="" class="text-blackie font-Roboto text-lg m-3 p-3 rounded-lg">
                <i class="fa-solid fa-bowl-food px-3"></i>
                Menu
            </a>
            <a href="" class="text-blackie font-Roboto text-lg m-3 p-3 rounded-lg">
                <i class="fa-solid fa-list px-3"></i>
                Order
            </a>
            <a href="" class="text-blackie font-Roboto text-lg m-3 p-3 rounded-lg">
                <i class="fa-solid fa-file-arrow-up px-3"></i>
                Report
            </a>
            <a href="" class="text-blackie font-Roboto text-lg m-3 p-3 rounded-lg">
                <i class="fa-solid fa-user px-3"></i>
                Staff
            </a>
        </div>
    </div>
</div>
