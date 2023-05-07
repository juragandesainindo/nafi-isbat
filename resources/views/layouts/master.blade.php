<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SINAFIS - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/') }}assets/extensions/choices.js/public/assets/styles/choices.css">

    <link rel="stylesheet" href="{{ asset('/') }}assets/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="{{ asset('/') }}assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/') }}assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="{{ asset('/') }}assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/pages/simple-datatables.css">

    <link rel="stylesheet" href="{{ asset('/') }}assets/extensions/filepond/filepond.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/pages/filepond.css">

    <link rel="stylesheet" href="{{ asset('/') }}assets/css/shared/iconly.css">

</head>

<body>

    @include('sweetalert::alert')

    <div id="app">

        @include('layouts.sidebar')


        @yield('content')
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="{{ asset('/') }}assets/js/bootstrap.js"></script>
    <script src="{{ asset('/') }}assets/js/app.js"></script>

    <script src="{{ asset('/') }}assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="{{ asset('/') }}assets/js/pages/form-element-select.js"></script>

    <script src="{{ asset('/') }}assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="{{ asset('/') }}assets/js/pages/simple-datatables.js"></script>

    <script src="{{ asset('/') }}assets/extensions/filepond/filepond.js"></script>
    <script src="{{ asset('/') }}assets/js/pages/filepond.js"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('/') }}assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('/') }}assets/js/pages/dashboard.js"></script>

    @stack('js')

</body>

</html>