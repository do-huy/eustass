@extends('client.layouts.master')
@section('css')
<link href="{{ asset('/font/css/address.css') }}" rel="stylesheet">
@endsection
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
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <p class="text-danger">{{ $error }}</p>
                            </div>
                        @endforeach
                        <div class="gach-account"></div>
                        <div class="address-store">
                            @foreach(Auth::user()->addresses; as $address)
                                <div class="address-1">
                                    <div class="form-group">
                                        <div class="name-address"><span>{{$address->name}}</span></div>
                                        <div class="contact-address">Địa chỉ : {{$address->description}}, {{$address->ward->name}}, {{$address->district->name}}, {{$address->province->name}}, Việt Nam</div>
                                        <div class="phone-address">Số điện thoại : {{$address->phone}}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="add-address">Bạn muốn giao hàng đến địa chỉ khác? <a data-toggle="modal" data-target="#addressModal">Thêm địa chỉ giao hàng mới</a></div>
                    </div>
                </div>
			</div>
		</div>
    </div>

    {{-- address form --}}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" id="addressModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" name="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="addressModalLabel"> Thêm địa chỉ mới </h4>
                </div>

                <div class="modal-body">
                    <form action="{{route('store.address')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên người nhận (*)</label>
                            <input type="text" class="form-control" name="name" value="{{ old('description') }}">
                        </div>
                        <div class="form-group">
                            <label for="number">Số điện thoại người nhận (*)</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('description') }}">
                        </div>
                        <div class="form-group">
                            <label for="province">Thành Phố (*)</label>
                            <select id="province_id" class="form-control" name="province_id">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district_id">Quận huyện (*)</label>
                            <select id="district_id" class="form-control" name="district_id">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ward_id">Phường xã (*)</label>
                            <select id="ward_id" class="form-control" name="ward_id">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Địa chỉ chi tiết (*)</label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                        </div>
                        <button class="btn btn-primary">Thêm địa chỉ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- address form --}}
@endsection
@section('script')
<script type="text/javascript">
    var provinces = {!! json_encode($provinces->toArray()) !!};
    var districts = [];
    var wards = [];
    writeDistricts(provinces);
    writeWard(districts);
    $('#province_id').change(function () {
        writeDistricts(provinces);
        writeWard(districts);
    });
    $('#district_id').change(function () {
        writeWard(districts);
    });

    function writeDistricts(provinces) {
        let p = provinces.filter(province => province.id == $('#province_id').val());
        districts = p[0].districts;
        $('#district_id').empty();
        districts.forEach(destrict => {
            let html = `<option value="${destrict.id}">${destrict.name}</option>`;
            $('#district_id').append(html);
        });
    }
    function writeWard(districts) {
        let d = districts.filter(district => district.id == $('#district_id').val());
        wards = d[0].wards;
        $('#ward_id').empty();
        wards.forEach(ward => {
            let html = `<option value="${ward.id}">${ward.name}</option>`;
            $('#ward_id').append(html);
        });
    }
</script>
<script src="{{asset('font/js/myscript.js')}}"></script>
@if(session('success'))
    <script>
        swal({
            title: "Cập nhập thêm địa chỉ thành công!",
            text: "Cảm ơn bạn đã sử dụng dịch vụ!",
            icon: "success",
            button: false,
            timer: 2000,
        });
    </script>
@endif
@endsection

