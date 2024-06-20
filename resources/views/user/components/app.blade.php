<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dcfarm - Agriculture and Dairy Farm   HTML Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/dripicons.css')}}">
        <link rel="stylesheet" href="{{ asset('css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('css/meanmenu.css')}}">
        <link rel="stylesheet" href="{{ asset('css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/index.css') }}">

    </head>
    <body>
    <!-- Cursor -->
    <div class="cursor js-cursor"></div>
    @include('user.components.header')
    @yield('content')
    @include('user.components.footer')
    @yield('js')


    <!-- JS here -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{ asset('js/vendor/jquery-3.6.4.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/slick.min.js')}}"></script>
    <script src="{{ asset('js/ajax-form.js')}}"></script>
    <script src="{{ asset('js/paroller.js')}}"></script>
    <script src="{{ asset('js/wow.min.js')}}"></script>
    <script src="{{ asset('js/js_isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('js/imagesloaded.min.js')}}"></script>
    <script src="{{ asset('js/parallax.min.js')}}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{ asset('js/parallax-scroll.js')}}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('js/element-in-view.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    </body>
    </html>
