<div>
    <main class="container mx-auto mb-10">

        <section class="flex flex-col items-center py-5 px-5 md:mx-20">
            <h3 class="font-seoulHangang text-2xl text-secondary">How to order</h3>
            <img src="{{asset('storage/images/STEP.png')}}" alt="step" class="mt-5 md:h-350">
        </section>

        <section class="grid grid-cols-2 gap-5 px-5 container mx-auto lg:max-w-5xl md:px-24">
            <a href="/view-menu/{{ $category->id }}" class="col-span-2">
                <div class="bg-no-repeat bg-right-bottom h-40 rounded-md border shadow-md p-5 bg-white"
                    style="background-image: url('{{asset('storage/images/orderbg.png')}}');">
                    <h1 class="font-seoulHangang text-xl">Order Online Now</h1>
                    <h3 class="text-sm">Start Ordering Now</h3>
                </div>
            </a>

            <a href="/contact-us"
                class="border bg-white rounded-md max-h-64 flex flex-col items-center justify-center font-seoulHangang shadow-md">
                <div class="text-center text-2xl">Contact <br> Us</div>
            </a>

            <a href="/about-us" class="border rounded-md bg-white max-h-64 shadow-md">
                <div class="flex flex-col items-center p-3">
                    <div class="font-seoulHangang text-xl py-2">About Us</div>
                    <img src="{{asset('storage/images/aboutus.png')}}" alt="about us" class="h-36">
                </div>
            </a>
        </section>

    </main>

</div>
