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
    <header class="m-header">
        <div class="m-bhhlc">
            <button class="m-hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <a href="" class="m-logo">
                <img src="{{asset('font/images/home/huy.png')}}" alt="">
            </a>

            <a href="" class="m-cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="m-count">1</span>
            </a>

            <div class="m-search-group">
                <i class="fas fa-search"></i>
                <input type="text" aria-label="search" class="m-search form-control" placeholder="Bạn muốn tìm gì hôm nay?">
            </div>
            
        </div>

    </header>
    @yield('content')


    <script src="{{asset('mobile/js/plugins.js?v=1')}}"></script>
    @yield('script')

</body>
</html>