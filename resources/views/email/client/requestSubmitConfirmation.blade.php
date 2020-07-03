@component('mail::message')

Dear {{ $client->name }}

Your request ticket number  <h5><strong>{{$request->ticket }} </strong>  </h5>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis odit similique, sed illo sint excepturi. Suscipit ullam labore, voluptatum, magni voluptas voluptatibus soluta quibusdam mollitia placeat, similique minus nam? At.

@component('mail::button', ['url' => '/'])
View Your request progress
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
