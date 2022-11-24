<x-guest-layout>
    <form action="{{ route('pay') }}" method="POST">
        @csrf
        <div class="md:container mx-auto md:p-10">
            <div class="py-5 bg-primary text-secondary-600 shadow-md rounded-b-xl">

                <div>
                    <h3 class="text-2xl font-seoulHangang text-center">Old Town White Coffee</h3>
                    <h3 class="text-base pt-3 font-seoulHangang text-center">Last Step for your meal!</h3>
                </div>

                <div class="font-poppins">
                    <h3 class="p-5 md:text-center">Your Order:</h3>
                    <div class="grid grid-cols-3 md:place-items-center">
                        <div class="px-5">
                            @foreach ($nameArr as $name)
                                <h3 class="text-sm">{{ $name }}</h3>
                                <input type="hidden" name="menuName[]" value="{{ $name }}">
                            @endforeach
                        </div>
                        <div>
                            <div class="text-center">
                                @foreach ($quantityArr as $quantity)
                                    <h3>x {{ $quantity }}</h3>
                                    <input type="hidden" name="quantity[]" value="{{ $quantity }}">
                                @endforeach
                            </div>
                        </div>
                        <div class="text-sm">
                            <div class="px-5">
                                @foreach ($priceArr as $price)
                                    <h3>RM {{ number_format($price, 2) }}</h3>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <h3 class="font-seoulHangang text-xl text-center">Total: {{ $total }}</h3>
                    </div>
                </div>
            </div>

            <div class="p-5 pb-0">
                <div class="pb-3">
                    <h3 class="text-center">Your Table:</h3>
                    <select name="customer_table"    class="text-center peer mt-1 block w-full px-3 py-2
                    bg-white rounded-md text-sm shadow-sm placeholder-slate-400">
                        <option value="1">Table 1</option>
                        <option value="2">Table 2</option>
                        <option value="3">Table 3</option>
                        <option value="4">Table 4</option>
                        <option value="5">Table 5</option>
                        <option value="6">Table 6</option>
                        <option value="7">Table 7</option>
                        <option value="8">Table 8</option>
                        <option value="9">Table 9</option>
                        <option value="10">Table 10</option>
                    </select>
                </div>

                <div class="pb-1">
                    <label for="email" class="block mb-2 text-sm font-medium">Email Address</label>
                    <input type="email" placeholder="email@gmail.com" name="email" id="email" required
                        class="peer mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md
                        text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-primary
                        focus:ring-1 focus:ring-primary invalid:border-pink-500 invalid:text-pink-600
                        focus:invalid:border-pink-500 focus:invalid:ring-pink-500" />

                    <p class="invisible peer-invalid:visible text-red-700 font-light">
                        Please enter a valid email address
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-x-5 pb-1">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium">First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="First Name" required
                            class="peer mt-1 block w-full px-3 py-2 bg-white border border-slate-300
                            rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none
                            focus:border-primary focus:ring-1 focus:ring-primary invalid:border-pink-500
                            invalid:text-pink-600  focus:invalid:border-pink-500
                            focus:invalid:ring-pink-500" />

                        <p class="invisible peer-invalid:visible text-red-700 font-light">
                            Please enter your first name
                        </p>

                    </div>

                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium">Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name" required
                            class="peer mt-1 block w-full px-3 py-2 bg-white border border-slate-300
                            rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none
                            focus:border-primary focus:ring-1focus:ring-primary invalid:border-pink-500
                            invalid:text-pink-600  focus:invalid:border-pink-500
                            focus:invalid:ring-pink-500" />

                        <p class="invisible peer-invalid:visible text-red-700 font-light">
                            Please enter your last name
                        </p>
                    </div>
                </div>

                <div class="pb-1">
                    <label for="contact_number" class="block mb-2 text-sm font-medium">Phone Number</label>
                    <input type="text" name="contact_number" id="contact_number" placeholder="Phone Number"
                    class="peer mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md
                    text-sm shadow-sm
                    placeholder-slate-400 focus:outline-nonefocus:border-primary focus:ring-1
                    focus:ring-primary invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500" required />

                    <p class="invisible peer-invalid:visible text-red-700 font-light">
                        Please enter your contact number
                    </p>

                </div>


                <input type="hidden" name="total" value="{{ $total }}">
                <input type="hidden" name="cost_price" value="{{ $sum }}">

                <button type="submit" class="w-full block bg-primary text-xl font-seoulHangang rounded-sm
                    my-3 p-2">
                    Next
                </button>
            </div>
    </form>
    <a href="/">
        <h3 class="text-center text-gray-500 mb-5 py-3">Cancel</h3>
    </a>


    <script>
        var tele = document.querySelector('#contact_number');

        tele.addEventListener('keyup', function(e) {
            if (event.key != 'Backspace' && (tele.value.length === 3 || tele.value.length === 7)) {
                tele.value += '-';
            }
        });
    </script>
</x-guest-layout>
