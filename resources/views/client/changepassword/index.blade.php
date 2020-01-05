@extends('client.layouts.master')

@section('content')
	<div style="margin-top:20px;margin-bottom:20px;background:#DDDDDD" class="container">
		<div class="row p-5">
			<div class="features_item">
                <div class="col-sm-3">
                    @include('client.layouts.nav_account')
                </div>

                <div class="col-sm-9">
                    <h2 style="margin-top:20px" class="title text-center">Thông tin tài khoản</h2>
                    <div class="header-account">
                        <span class="myprofile"><b>Hồ sơ của bạn</b></span>
                        <p>Quản lý thông tin mật khẩu để bảo mật tài khoản</p>
                    </div>
                    <div class="content-account">
                        <div class="gach-account"></div>
                        <form id="userForm" action="{{ route('change.password.update') }}" method="POST" >
                            @csrf
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <p class="text-danger">{{ $error }}</p>
                                </div>
                            @endforeach
                            <div class="form-password">
                                <div class="border-pasword">
                                    <div class="margin-password">
                                        <div class="form-group">
                                            <label>Mật khẩu cũ (*)</label>
                                            <input type="password" class="form-control" name="current_password" autocomplete="current-password">
                                            <label>Mật khẩu mới (*)</label>
                                            <input type="password" class="form-control" name="new_password" autocomplete="current-password">
                                            <label>Nhập lại mật khẩu mới (*)</label>
                                             <input type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                   <button type="submit" class="btn btn-primary btn-submit">
                                        Cập nhập mật khẩu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script src="{{asset('font/js/myscript.js')}}"></script>
@if(session('success'))
    <script>
        swal({
            title: "Cập nhập mật khẩu thành công!",
            text: "Cảm ơn bạn đã sử dụng dịch vụ!",
            icon: "success",
            button: false,
            timer: 2000,
        });
    </script>
@endif
@endsection

