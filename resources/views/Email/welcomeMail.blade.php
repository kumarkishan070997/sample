@component('mail::message')
# Thank you for Registering

Thank you for reading this article and for being a part of our family

@component('mail::button', ['url' => ''])
Demo Button
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
