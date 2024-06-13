@include('_message')

@component('mail::message')
Hello {{$user->name}}

{!! $user->send_message !!}


Thanks,<br>
{{config('APP_NAME')}} 
@endcomponent