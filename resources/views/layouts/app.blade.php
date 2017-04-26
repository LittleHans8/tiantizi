<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="天梯子- @yield('title')">
    <meta name="author" content="天梯子">
    <meta name="keyword" content="天梯子官网">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <<title>天梯子 - @yield('title')</title>

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>

<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        @yield('contain')

    </div>
</div>

<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('js/libs/jquery.min.js') }}"></script>
<script src="{{ asset('js/libs/tether.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
@yield('script')

</body>

</html>