@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => url('/confirm/connections'])
    view connection
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
