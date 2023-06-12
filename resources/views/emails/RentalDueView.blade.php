@component('mail::message')
Hi {{ $user->first_name }},

Your rental payment is due tomorrow.
Please ensure you pay it on time to stop our systems from emobilising the motorcycle.

Thank you for your continued custom.

<!-- @component('mail::button', ['url' => 'neguinhomotors.co.uk/contact'])
CLICK HERE
@endcomponent -->

@endcomponent
