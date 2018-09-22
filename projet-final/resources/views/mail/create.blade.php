@component('mail::message')
# Greetings admin

-{{$name}}<br>
-{{$email}}

@component('mail::panel')
  {{$msg}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
