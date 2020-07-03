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
    {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div>
    @include('inc.navbar')
    <div class="wrapper" id="app">
            @include('inc.sidebar')
        <div class="main">          
           <div class="row menu-section">
                <div class="menu d-flex align-items-center">
                    <a href="#"><i class="fa fa-bars fa-lg"  ></i></a>
                </div>   
            </div>
            @yield('content') 
        </div>
    </div>
    
</div>
<script src="{{ asset('js/app.js') }}" ></script>
@yield('script')
</body>
</html>