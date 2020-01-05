@extends('client.layouts.master')

@section('content')
	<div style="margin-top:20px;margin-bottom:20px;background:#DDDDDD" class="container">
		<div class="row p-5">
			<div class="features_item">
                <div class="col-sm-3">
                    @include('client.layouts.nav_account')
                </div>
                <div class="col-sm-9 ">
                    <h2 style="margin-top:20px" class="title text-center">Thông tin tài khoản</h2>
                    <div class="header-account">
                        <span class="myprofile"><b>Hồ sơ của bạn</b></span>
                        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    </div>
                    <div class="content-account">
                        <div class="gach-account"></div>
                        <form id="addform" enctype="multipart/form-data"  action="{{route('user.update')}}" method="POST">
                            @csrf
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <p class="text-danger">{{ $error }}</p>
                                </div>
                            @endforeach
                            <div class="form-account">
                                <div class="border-account">
                                    <div class="margin-account">
                                        <div class="form-group">
                                            <label for="name">Tên tài khoản</label>
                                            <input type="text" name="name" class="form-control" value="{{$user->name}}">

                                            <label for="email">Email tài khoản</label>
                                            <input type="email" name="email" class="form-control" value="{{$user->email}}">

                                            <label for="number">Số điện thoại</label>
                                            <input type="number" name="number" class="form-control" value="{{$user->number}}">

                                            <label for="avatar">Hình ảnh</label>
                                            <input  type="file"  name="avatar" class="form-control">
                                            <label for="date">Hình ảnh</label>

                                            <div class="date-custom" style="display: grid;grid-template-columns: auto auto auto;grid-gap: 30px">
                                                <select name="day" id="day" class="form-control">
                                                    @foreach ($date['day'] as $day)
                                                        <option {{ $day==$user->day?'selected':'' }} value="{{ $day }}">Ngày {{ $day }}</option>
                                                    @endforeach
                                                </select>
                                                <select name="month" id="month" class="form-control">
                                                    @foreach ($date['month'] as $month)
                                                        <option {{ $month==$user->month?'selected':'' }} value="{{ $month }}">Tháng {{ $month }}</option>
                                                    @endforeach
                                                </select>
                                                <select name="year" id="year" class="form-control">
                                                    @foreach ($date['year'] as $year)
                                                        <option {{ $year==$user->year?'selected':'' }} value="{{ $year }}">Năm {{ $year }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button id="submit" type="submit" class="btn btn-primary">Cập nhập tài khoản</button>
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
            title: "Cập nhập tài khoản thành công!",
            text: "Cảm ơn bạn đã sử dụng dịch vụ!",
            icon: "success",
            button: false,
            timer: 2000,
        });
    </script>
@endif
@endsection
