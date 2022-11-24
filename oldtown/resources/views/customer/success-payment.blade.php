<x-guest-layout>
    <div>
        <main class="container mx-auto px-10 py-5">
            <div class="flex flex-col h-screen justify-center items-center">
                <div class="text-center font-seoulHangang text-secondary-600">
                    <h1 class="text-3xl">Thank You!</h1>
                    <p class="font-bold font-poppins py-3">We are processing your order</p>
                    <p>Kindly Check your email for your order</p>
                </div>
                <div class="my-10">
                    <img src="{{ asset('storage/images/successpay.svg') }}" alt="success" class="w-48">
                </div>
                <a href="/">
                    <button class="w-full block bg-primary text-xl font-seoulHangang rounded-sm my-3 p-2 px-3">Back To Homepage</button>
                </a>
            </div>
        </main>
    </div>
</x-guest-layout>
