<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Eustass - @yield('title')</title>
	<link href="{{ asset('/font/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="{{ asset('/font/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/font/css/prettyPhoto.css') }}" rel="stylesheet">
	<link href="{{ asset('/font/css/price-range.css') }}" rel="stylesheet">
	<link href="{{ asset('/font/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/font/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/font/css/product.css') }}" rel="stylesheet">
    <link href="{{ asset('/font/css/menu.css') }}" rel="stylesheet" >
    <link href="{{ asset('/font/css/order.css') }}" rel="stylesheet" >
    <link href="{{ asset('/font/css/like.css') }}" rel="stylesheet" >
    <link href="{{ asset('/font/css/account.css') }}" rel="stylesheet" >
    <link href="{{ asset('/font/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('/font/js/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('/font/js/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/menu.css') }}" rel="stylesheet">

    @yield('css')

</head>

<body><!--body-->
    @include('client.layouts.header')
    @yield('content')
    @include('client.layouts.footer')

	<script src="{{ asset('/font/js/jquery.js') }}"></script>
	<script src="{{ asset('/font/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/font/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('/font/js/price-range.js') }}"></script>
	<script src="{{ asset('/font/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('/font/js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('/font/js/slick/slick.js') }}"></script>
    <script src="{{ asset('/font/js/touchspin/jquery.bootstrap-touchspin.js') }}"></script>

    @yield('script')

</body><!--/body-->
</html>
