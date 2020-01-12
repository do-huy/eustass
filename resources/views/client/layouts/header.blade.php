<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> Hotline : 03.6709.7315</a></li>
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
                            <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-users" aria-hidden="true"></i></a></li>
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
                <div class="header-content-new">
                    <div class="header-logo-find-new">
                        <div class="logo-new">
                            <a href="{{route('home')}}">
                                <img class="size-header-logo" src="/font/images/home/huy.png" alt="" />
                            </a>
                        </div>
                        <div class="find-new">
                            <form class="example" action="{{ route('home') }}"  role="search">
                                <input type="text" placeholder="Tìm kiếm sản phẩm bạn mong muốn ..." name="keyword">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="header-nav-new">
                        <a href="{{route('order.index')}}" title="Theo dõi đơn hàng">
                            <div class="header-goods-new">
                                <i id="header-icon-check" class="fas fa-file-invoice-dollar"></i>
                                <span class="text-header-goods-new">Theo dõi<br>đơn hàng</span>
                            </div>
                        </a>

                        <div class="header-content-login-new">
                            <i id="header-icon-check" class="fa fa-bell" aria-hidden="true"></i>
                            <span class="header-number-notification-new">5</span>
                            <span class="header-content-notification-new">Thông báo<br>của tôi</span>
                            <div class="header-content-notification-new"><ul></ul></div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                            @csrf
                        </form>
                        @auth
                        <div class="header-content-login-new">
                            <i id="header-icon-check" class="fa fa-user" aria-hidden="true"></i>
                            <span class="header-content-notification-new"></span>
                            <span  class="new-login">Chào {{ Str::limit(Auth::user()->name,5) }}<br>tài khoản</span>
                            <div class="toggler Userstyle__UserDropDown-xrezqc-5 important-login">
                                <a href="{{route('profile.index')}}"><p class="gCPwrW">Thông tin tài khoản</p></a>
                                <a href="{{route('address.index')}}"><p class="gCPwrW">Thêm mới địa chỉ</p></a>
                                <a href="{{route('change.password')}}"><p class="gCPwrW">Đổi mật khẩu</p></a>
                                <a onclick="document.getElementById('logout-form').submit()"> <p class="gCPwrW">Đăng xuất</p></a>
                            </div>
                        </div>
                        @else
                        <div class="header-content-login-new">
                            <i id="header-icon-check" class="fa fa-user" aria-hidden="true"></i>
                            <span class="header-content-notification-new"></span>
                            <span  class="new-login">Đăng nhập<br>Tài khoản</span>
                            <div class="toggler Userstyle__UserDropDown-xrezqc-5 important-login">
                                <button data-toggle="modal" data-target="#loginModal" class="header-color-login-new">Đăng nhập</button>
                                <button data-toggle="modal" data-target="#registerModal" class="header-color-login-new">Tạo tài khoản</button>
                                <a href="{{ url('/auth/facebook')}}">
                                    <button class="header-color-facebook-new">
                                        <span class="kceUvB">
                                            <i class="fab fa-facebook"></i>
                                        </span>Đăng nhập bằng Facebook
                                    </button>
                                </a>
                                <button class="header-color-google-new">
                                    <span class="Userstyle__ButtonIcon-xrezqc-9 kceUvB">
                                        <i class="fab fa-google-plus-g"></i>
                                    </span>Đăng nhập bằng Google
                                </button>
                                <button class="header-color-zalo-new">
                                    <span class="Userstyle__ButtonIcon-xrezqc-9 kceUvB">
                                        <i class="fab fa-zalo"></i>
                                    </span>Đăng nhập bằng Zalo
                                </button>
                            </div>
                        </div>
                        @endauth

                        <a href="{{route('cart.detail')}}">
                            <div class="header-content-cart-new">
                                <i style="margin-right: 5px" class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="header-name-cart-new">Giỏ hàng
                                    <span class="header-name-number-new">{{ Auth::check()?Auth::user()->carts->sum('amount'):'0' }}</span>
                                </span>
                            </div>
                        </a>
                        {{-- <a href="{{route('cart.detail')}}">
                            <div class="cart-client-khung pull-right">
                                <div class="cart-client-note ">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="sum_amount">Giỏ hàng</span>
                                    <span class="sum_amount_background">
                                        <span class="sum_amount_number">{{ Auth::check()?Auth::user()->carts->sum('amount'):'0' }}</span>
                                    </span>

                                </div>
                            </div>
                            </a> --}}


                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->

<!--Login-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" id="loginModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" name="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <div style="text-align: center">
                <img  width="50px" src="../upload/login/logo.png">
                </div> --}}
            </div>

            <div class="modal-body">
                {{-- Login form --}}

                <div class="col-sm-6">
                    <div class="login-content">
                        <h3>Đăng nhập</h3>
                        <div class="content-note-login">
                            Đăng nhập có thể sử dụng các dịch vụ mua và bán của Eustass, cũng như tìm kiếm để mua các sản phẩm mong muốn.
                        </div>
                        <div class="image-note-login">
                            <img width="100%" src="../upload/login/icon.png">
                        </div>
                    </div>
                </div>

                <div id="form-login-login" class="col-sm-6">
                    <div class="forn-icon-fb-g">
                        <a href="{{ url('/auth/facebook')}}" style="background:#3b5998;color:aliceblue;width:100%" class="btn w-100 text-white facebook-login"><i class="fa fa-facebook"></i> Facebook</a>
                        <a href="#" style="background:#dc4537;color:aliceblue;width:100%;margin-top: 10px" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Google</a>
                    </div>
                    <div class="athoer">
                        <span>-- Hoặc --</span>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Điện thoại / Email" name="email" value="{{ old('email') }}">
                            @error('email'){{ $massage }}@enderror
                        </div>
                        <div class="form-group">

                            <input type="password" class="form-control" placeholder="Mật khẩu" name="password" value="{{ old('password') }}">
                            @error('email'){{ $massage }}@enderror
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember-check">
                            <span class="form-check-label" for="check-dieu-khoan">Nhớ tài khoản</span>
                            <a class="quen_mk" id="formForgetBtn">Quên mật khẩu?</a>
                        </div>

                        <button id="btnLoginSubmit" type="submit" class="btn btn-danger w-100 mb-3">Đăng nhập</button>
                    </form>

                    <div class="login-register">
                        <span>Bạn chưa có tài khoản ?</span>
                        <a data-toggle="modal" data-target="#registerModal" class="dk_dangky text-danger">Đăng ký</a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<!--/Login-->


<!--Register-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" id="registerModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" name="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <div style="text-align: center">
                <img  width="50px" src="../upload/login/logo.png">
                </div> --}}
            </div>

            <div class="modal-body">
                {{-- Login form --}}

                <div class="col-sm-6">
                    <div class="login-content">
                        <h3>Đăng ký</h3>
                        <div class="content-note-login">
                            Đăng nhập có thể sử dụng các dịch vụ mua và bán của Eustass, cũng như tìm kiếm để mua các sản phẩm mong muốn.
                        </div>
                        <div class="image-note-login">
                            <img width="100%" src="../upload/login/icon.png">
                        </div>
                    </div>
                </div>

                <div id="form-login-login" class="col-sm-6">
                    <div class="forn-icon-fb-g">
                        <a href="{{ url('/auth/facebook')}}" style="background:#3b5998;color:aliceblue;width:100%" class="btn w-100 text-white facebook-login"><i class="fa fa-facebook"></i> Facebook</a>
                        <a href="#" style="background:#dc4537;color:aliceblue;width:100%;margin-top: 10px" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Google</a>
                    </div>
                    <div class="athoer">
                        <span>-- Hoặc --</span>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" >{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">

                            <label for="email" >{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">

                            <label for="password" >{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">

                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="number" >{{ __('number') }}</label>
                                <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="email">

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <button id="btnLoginSubmit" type="submit" class="btn btn-danger w-100 mb-3">Đăng ký</button>
                    </form>

                    <div class="login-register">
                        <span>Bạn đã có tài khoản ?</span>
                        <span data-toggle="modal" data-target="#loginModal" class="dk_dangky text-danger">Đăng nhập</span>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<!--/Register-->
