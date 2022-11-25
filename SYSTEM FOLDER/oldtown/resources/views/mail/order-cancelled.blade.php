@component('mail::message')
# Order Cancelled

@component('mail::panel')
    Looks like you cancelled your order
@endcomponent

## If you did not cancel your order, please kindly tell the waiter

Regard,<br>
{{ config('app.name') }}
@endcomponent
