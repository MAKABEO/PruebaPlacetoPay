<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vegefood/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vegefood/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('vegefood/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vegefood/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vegefood/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('vegefood/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('vegefood/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vegefood/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('vegefood/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('vegefood/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('vegefood/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('vegefood/css/style.css') }}">

    @stack('styles')
</head>
<body class="goto-here">
@include('layouts.header')
@include('layouts.menu.top-menu')
@include('layouts.shop.banner')
<!-- END nav -->

@yield('content')


@include('layouts.footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ asset('vegefood/js/jquery.min.js') }}"></script>
<script src="{{ asset('vegefood/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('vegefood/js/popper.min.js') }}"></script>
<script src="{{ asset('vegefood/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vegefood/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('vegefood/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('vegefood/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('vegefood/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vegefood/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vegefood/js/aos.js') }}"></script>
<script src="{{ asset('vegefood/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('vegefood/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('vegefood/js/scrollax.min.js') }}"></script>
<script src="{{ asset('vegefood/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
