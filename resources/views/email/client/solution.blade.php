@component('mail::message')
# Request #{{$request->ticket}}

 your request is solved now !

@component('mail::button', ['url' => ''])
show solution
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
