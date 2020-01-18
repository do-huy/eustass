<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('eustass')}}</title>
    <link rel="stylesheet" href="{{asset('mobile/css/app.css?v=1')}}">
    <link rel="stylesheet" href="{{asset('mobile/css/all.min.css?v=1')}}">
    <link rel="stylesheet" href="{{asset('mobile/css/modules/layouts.css?v=1')}}">

    @yield('css')
</head>
<body>
    
    @include('mobile.includes.menu')
    @include('mobile.includes.header')

    <main class="m-main mt-0">

        @yield('content')

    </main>

    <script src="{{asset('mobile/js/plugins.js?v=1')}}"></script>
    <script src="{{asset('mobile/js/modules/master.js?v=1')}}"></script>
    @yield('script')

</body>
</html>