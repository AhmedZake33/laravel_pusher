@component('mail::message')
<h1>{{$title}}</h1>
# Introduction
MAIL
The body of your message.
<hr />
{{$data}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
