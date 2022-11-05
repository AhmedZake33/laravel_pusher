@component('mail::message')
# Introduction

The body of your message.
this is title of email  . 
MaIL 4
<hr />
{{$data}}
@component('mail::button', ['url' => ''])
 Click Here 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
