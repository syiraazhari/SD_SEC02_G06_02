@component('mail::message')
# Thank You For Your Order

@component('mail::panel')
    Your order Has Been Confirmed
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
