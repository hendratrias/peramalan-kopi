<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo asset('assets/images/mug.png'); ?>">
</head>

<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="{{asset('assets/sweetalert/sweetalert.min.js')}}"></script>
    @include('sweetalert::alert')
</body>

</html>