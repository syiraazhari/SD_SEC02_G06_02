<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        $cart = $request->session()->get('shopping-cart');

        $total = $request->total;

        $menu_name = $cart->implode('name', ', ');
        $nameArr = explode(', ', $menu_name);

        $cost_price = $cart->implode('cost_price', ', ');
        $costArr = explode(', ', $cost_price);

        $price = $cart->implode('price', ', ');
        $priceArr = explode(', ', $price);

        $quantity = $cart->implode('quantity', ', ');
        $quantityArr = explode(', ', $quantity);

        $sum = array_sum($costArr);

        return view('customer.checkout', compact([
            'nameArr',
            'quantityArr',
            'priceArr',
            'sum',
            'total'
        ]));
    }

    public function checkout(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $menu_name = $request->menuName;
        $quantity = $request->quantity;
        $total = $request->total;
        $cost_price = $request->cost_price;

        $validatedData = $request->validate([
            'customer_table' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'contact_number' => 'required',
        ]);

        $full_name = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
        $description = "table: " . $request->customer_table;
        $totalPrice = round($total * 100);

        $customer = $stripe->customers->create([
            'description' =>  $description,
            'name' => $full_name,
            'email' => $validatedData['email'],
            'phone' => $validatedData['contact_number']
        ]);

        $intent = $stripe->paymentIntents->create(
            [
              'amount' => $totalPrice,
              'currency' => 'myr',
              'automatic_payment_methods' => ['enabled' => true],
              'customer' => $customer,
              'description' => $customer->description,
            ]
        );

        $status = 'Verifying';

        DB::table('customer_order')->insert([
            'customer_id'  => $customer->id,
            'first_name'   => $validatedData['first_name'],
            'last_name'    => $validatedData['last_name'],
            'email'        => $validatedData['email'],
            'sum_cost'     => $cost_price,
            'phone_number' => $validatedData['contact_number'],
            'total_price'  => $total,
            'menu_name'    => implode(', ', $menu_name),
            'quantity'     => implode(', ', $quantity),
            'status'       => $status,
            'customer_table' => $validatedData['customer_table'],
            'ordered_at'   => Carbon::now()
        ]);

        Cart::clear();

        return view('customer.pay')->with([
            'intent' => $intent,
            'customer' => $customer,
        ]);
    }

    public function cancel(Request $request)
    {
        Cart::clear();
        $customer_id = $request->customer_id;
        DB::table('customer_order')->where('customer_id', $customer_id)->delete();
        return view('customer.cancel-payment');
    }

    public function success()
    {
        return view('customer.success-payment');
    }

}