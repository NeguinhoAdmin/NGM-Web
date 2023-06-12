@component('mail::message')
Hi {{ $name }},

<img href="http://ngm.hi-bike4u.co.uk/img/neguinhomotors3.png">

@component('mail::button', ['url' => 'neguinhomotors.co.uk/contact'])
CLICK HERE
@endcomponent

@endcomponent
