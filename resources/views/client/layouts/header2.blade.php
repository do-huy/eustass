<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> + 03.6709.7315</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Eustass@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                    <a href="{{route('home')}}"><img src="/font/images/home/huy.png" height="60px" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @auth
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user" aria-hidden="true"></i><span> Chào : {{ Auth::check()?Auth::user()->name:'' }}</span><span class="caret"></span></a>

                                <ul style="padding-right: 15px" class="dropdown-menu">
                                    <li><a href="{{route('account.show')}}">Thông tin tài khoản</a></li>
                                    <li><a href="#">Đơn hàng của tôi</a></li>
                                </ul>
                                @endauth

                            </li>
                            {{-- <li><a href="#"><i class="fa fa-star"></i> Danh sách</a></li> --}}
                            <!-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Bảng giá</a></li> -->
                            {{-- <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Giỏ hàng(10)</a>
                                <ul>sadsad</ul>
                            </li> --}}


                            @auth
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                                    @csrf
                                </form>
                                <li><a href="#"  onclick="document.getElementById('logout-form').submit()"><i class="fa fa-lock"></i>thoát</a></li>
                            @else
                                <li><a href="#" data-toggle="modal" data-target="#registerModal"><i class="fa fa-lock"></i> Đăng ký</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
</header><!--/header-->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" id="loginModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" name="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="loginModalLabel"> Đăng nhập</h4>
            </div>

            <div class="modal-body">
                {{-- Login form --}}
                <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email'){{ $massage }}@enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            @error('email'){{ $massage }}@enderror
                        </div>
                        <button class="btn btn-primary">Đăng nhập</button>
                </form>
                <div class="social-auth-link text-center">
                    <p> - Hoặc - </p>
                    <a href="#" style="background:#3b5998;color:aliceblue;width:100%" class="btn w-100 text-white facebook-login"><i class="fa fa-facebook"></i> Facebook</a>
                    <a href="#" style="background:#dc4537;color:aliceblue;width:100%;margin-top: 10px" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Google</a>

                </div>


                <div class="modal-footer">
                {{-- Login footer --}}
                <a href="{{route('register')}}" class="text-center">Đăng ký</a>
                </div>
            </div>

        </div>
    </div>
</div>
