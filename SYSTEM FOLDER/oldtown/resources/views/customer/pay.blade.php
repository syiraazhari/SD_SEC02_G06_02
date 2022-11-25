<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/checkout.js')
</head>

<body>
    <div class="md:container mx-auto md:p-10">

        {{-- Payment Form --}}
        <div class="p-5">
            <form id="payment-form" data-secret="{{ $intent->client_secret }}">
                <div id="payment-element">
                    <!-- Elements will create form elements here -->
                </div>

                <button id="submit" class="w-full block bg-primary text-xl font-seoulHangang rounded-sm my-3 p-2">
                    Pay </button>
            </form>
            <form action="{{ route('cancel') }}"method="post">
                @csrf
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <button>
                    <h3 class="text-center text-gray-500">Cancel</h3>
                </button>
            </form>
        </div>

    </div>
    <script>
        var clientKey = "{{ $intent->client_secret; }}";
        var stripePublicKey = "{{ env('STRIPE_KEY') }}";
    </script>
</body>

</html>
