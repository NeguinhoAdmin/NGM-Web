@component('mail::message')
Hi {{ ucfirst(trans($user->first_name)) }},

Your rental payment is due by {{ Carbon\Carbon::now()->addDay()->format('d-m-Y') }}.

Please be prompt with your weekly payments as failure to pay on time will incur late payment fees.
A £20 fee is added each day, after the first day until the outstanding balance on the account is paid.

Please see the late payment fees table charges below:

DAY 1 £10<br>
DAY 2 £30<br>
DAY 3 £50<br>
DAY 4 £70<br>
DAY 5 £90<br>
DAY 6 £110<br>
DAY 7 130<br>

Thank you for your continued custom.

<!-- @component('mail::button', ['url' => 'neguinhomotors.co.uk/contact'])
CLICK HERE
@endcomponent -->

@endcomponent
