@component('mail::message')
Congratulations {{ $cakeAvailability->user->name }}! You will receive one of our cakes.

Weight: {{ $cakeAvailability->cake->weight }} g
Value: {{ currencyFormat($cakeAvailability->cake->value) }}

Thank you for using our service!

@endcomponent
