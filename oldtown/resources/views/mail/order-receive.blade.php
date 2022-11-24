@component('mail::message')
# Your order has been confirmed

@component('mail::panel')
   Your Order Purchase
@endcomponent
## Here is your order:

@component('mail::table')
| Name                     | Quantity
| ------------------------ |:-------------:|
@foreach ( $menu_name as $index => $name )
| {{$name}}                | {{$quantity[$index]}}    |
@endforeach
@endcomponent

### Total Price: RM{{$total}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
