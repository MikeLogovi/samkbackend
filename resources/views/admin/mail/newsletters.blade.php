@component('mail::message')
Hello,hope your are doing well

A new evebnt is organsized by SAM K TRAVEL AND TOUR 

WHY NOT PARTICIPATING?
The event is {{$myEvent->name}}

Participatio only cost : ¨{{$myEvent->price}}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
