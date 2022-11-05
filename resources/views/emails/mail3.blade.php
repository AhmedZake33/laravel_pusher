@component('mail::message')
# Introduction
MAIL3
The body of your message.
this is title of email  . 
<hr />
{{$data}}
@component('mail::button', ['url' => ''])
 Click Here 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
