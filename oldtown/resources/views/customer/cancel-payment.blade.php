<x-guest-layout>
    <div>
        <main class="container mx-auto px-10 py-5">
            <div class="flex flex-col  h-screen items-center justify-center">
                <div class="text-center font-seoulHangang text-secondary-600">
                    <h1 class="py-5 text-3xl">Payment Cancelled</h1>
                </div>
                <div class="my-10">
                    <img src="{{ asset('storage/images/cancelled.svg') }}" alt="cancel" class="w-48">
                </div>
                <a href="/">
                    <h3 class="text-center rounded-lg shadow-md bg-primary text-secondary-400 font-seoulHangang p-3">Back to Homepage</h3>
                </a>
            </div>

        </main>

    </div>

</x-guest-layout>
