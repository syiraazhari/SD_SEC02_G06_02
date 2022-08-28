<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d7e46647e7.js" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
    <title>OldTown White Coffee</title>
</head>

<body class="bg-[#F6F5F8]">

    <header class="bg-primary drop-shadow-xl">
        <nav class="container mx-auto p-5 flex justify-between items-center">
            <div>
                <a href="">
                    <img src="{{ asset('/storage/logo.svg') }}" alt="logo">
                </a>
            </div>
            <div class="rounded-xl bg-white px-5 py-1">
                <a href="">
                    <div>
                        <i class="fa-solid fa-bag-shopping text-secondary"></i>
                        <span class="ml-2 text-secondary font-RobotoSlab">Cart</span>
                    </div>
                </a>
            </div>
        </nav>
    </header>

    <div class="container mx-auto">
        <div class="mt-5 mx-5">
            <h2 class="text-center font-RobotoSlab text-3xl p-3 text-secondary">How to Order</h2>
            <img src="{{ asset('/storage/step.png') }}" alt="" class="lg:h-96 md:h-80 mx-auto rounded-md">
        </div>
    </div>
    <main class="mt-5 container mx-auto lg:w-3/6">
        <div class="bg-white rounded-lg shadow-md shadow-gray-300 mx-5 bg-no-repeat bg-right-bottom h-40"
            style="background-image: url('/storage/orderbg.png');">
            <a href="" class="">
                <h1 class="pl-5 pt-5 mb-2 font-RobotoSlab lg:text-4xl text-2xl text-secondary font-semibold">Order
                    Online Now
                </h1>
                <p class="pl-5 font-Roboto text-gray-400">Start ordering now</p>
            </a>
        </div>
    </main>

    <section class="container mx-auto my-5 lg:w-3/6">
        <div class="flex justify-between">
            <div class="bg-white rounded-lg shadow-md shadow-gray-300 mx-5">
                <a href="" class="">
                    <h3 class="p-5 mt-10 text-center font-RobotoSlab lg:text-4xl text-secondary font-semibold">Opening
                        Hour
                    </h3>
                </a>
            </div>
            <div class="bg-white rounded-lg shadow-md shadow-gray-300 mx-5 flex-grow">
                <a href="" class="flex justify-center flex-col items-center">
                    <h3 class="p-5 font-RobotoSlab lg:text-4xl text-center font-semibold text-secondary">About Us</h3>
                    <img src="{{ asset('/storage/about_us.png') }}" alt="about us" width="90px" class="mb-5">
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-primary">
        <div class="mx-10">
            <div class="border-b text-center pt-5 border-b-secondary font-RobotoSlab font-medium pb-2">OldTown White
                Coffee
            </div>
        </div>
        <div class="flex justify-between mx-10 py-10">
            <div>
                <h3 class="font-RobotoSlab text-secondary font-semibold">Follow Us</h3>
                <div class="flex pt-2">
                    <a href="" class="mr-3">
                        <img src="{{ asset('/storage/icon_facebook.svg') }}" alt="facebook">
                    </a>
                    <a href="">
                        <img src="{{ asset('/storage/emoji_instagram.svg') }}" alt="instagram">
                    </a>
                </div>
            </div>
            <div class="flex flex-col">
                <a href="" class="font-RobotoSlab text-secondary font-medium">Home</a>
                <a href="" class="font-RobotoSlab text-secondary font-medium">About Us</a>
                <a href="" class="font-RobotoSlab text-secondary font-medium">Opening Hour</a>
            </div>
        </div>
    </footer>
</body>

</html>
