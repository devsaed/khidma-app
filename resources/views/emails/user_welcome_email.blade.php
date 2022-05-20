@component('mail::message')
# Welcome 

We are pleased to have you join us, we wish you good luck and success,<br>

@component('mail::panel')
To complete your registeration, use below code in invitation screen.<br>
# Invitaion Code: 
@endcomponent

@component('mail::button', ['url' => ''])
Store CMS
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent