<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="clients">
        <div class="content">
        {{-- <div class="container-form"> --}}
            <a href="http://maxnet-is.ae/"><img src="/img/logo.png" alt="" width="200"></a>
            <div class="row mt-5 pl-3">

                <p>Our support portal allows our customers to create and manage technical support requests. Please click on the below button to access the portal.</p>
                
                {{-- @component('components.who')  @endcomponent --}}
            </div>
            {{-- <div class="row mt-5 pl-3">
                <a href="#"><i class="fa fa-lg fa-facebook"></i></a>
                <a href="#"><i class="fa fa-lg fa-google"></i></a>
                <a href="#"><i class="fa fa-lg fa-linkedin"></i></a>
            </div> --}}
        {{-- </div> --}}
        </div>
        <div class="container-form">
            @include('inc.notes')
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#home">LOGIN</a>
                </li>
                
            </ul>
            <div class="tab-content">
                @include('auth.client-login')
            </div>                   
        </div>
             

    </div>
 </div>
</body>
</html>