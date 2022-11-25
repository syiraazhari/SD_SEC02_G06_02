@component('mail::message')
# Thank You For Your Order

@component('mail::panel')
    Your order status
@endcomponent
<h3> Dear {{$name}}</h3>
<h3> Order ID: {{$customer_id}}</h3>
<h3> Status: Order Completed</h3>

Regard,<br>
{{ config('app.name') }}
@endcomponent
