<nav class="bg-blackie border-b border-b-blackie p-3 shadow-md" x-data="{ isOpen: false }">
    <div class="flex md:justify-between justify-end py-2">
        <h1 class="hidden md:block md:ml-10 font-robotoSlab text-white">OldTown White Cofee</h1>
        <div class="flex">
            <!-- Dropdown profile -->
            <div class="flex justify-center">
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
                        class="flex items-center mr-16 px-5 text-white">
                        {{ Auth::user()->first_name }} <span>
                            <svg class="h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>

                        </span>

                    </button>

                    <!-- Panel -->
                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;"
                        class="border-b absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">

                        <a href="{{ route('view_profile') }}"
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
    </div>

</nav>
