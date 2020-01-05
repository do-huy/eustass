<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Eustass - @yield('title')</title>

	<link href="{{ asset('/font/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/font/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/font/css/prettyPhoto.css') }}" rel="stylesheet">
	<link href="{{ asset('/font/css/price-range.css') }}" rel="stylesheet">
	<link href="{{ asset('/font/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('/font/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/font/css/responsive.css') }}" rel="stylesheet">
    @yield('css')

	{{-- <link href="{{ asset('/font/images/ico/favicon.ico') }}" rel="stylesheet">

	<link rel="apple-touch-icon-precomposed" href="{{ asset('/font/images/ico/apple-touch-icon-144-precomposed.png') }}" rel="stylesheet">

	<link rel="apple-touch-icon-precomposed" href="{{ asset('/font/images/ico/apple-touch-icon-114-precomposed.png') }}" rel="stylesheet">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('/font/images/ico/apple-touch-icon-72-precomposed.png') }}" rel="stylesheet">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('/font/images/ico/apple-touch-icon-57-precomposed.png') }}" rel="stylesheet"> --}}
</head><!--/head-->

<body>

    @include('client.layouts.header2')

    @yield('content')

	<script src="{{ asset('/font/js/jquery.js') }}"></script>
	<script src="{{ asset('/font/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/font/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('/font/js/price-range.js') }}"></script>
	<script src="{{ asset('/font/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('/font/js/main.js') }}"></script>

    @yield('script')
</body>
</html>
