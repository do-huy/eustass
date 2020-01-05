@extends('client.layouts.master2')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('font/css/chose-address.css')}}">
@endsection

@section('content')

<div id="chose-address"  class="row">
    <div class="container">
        <div class="col-sm-12">
            <div class="features_items">
                <main style="background:#F5F5F5">
                    <div class="title">
                        <h4>2. Địa chỉ giao hàng</h4>
                        <p>Chọn địa chỉ giao hàng có sẵn bên dưới:</p>
                            <div class="grid-container">
                                @foreach(Auth::user()->addresses; as $address)
                                    <div class="text-left bg-white siggle-contact">
                                        <div class="name-contact"><h3>{{$address->name}}</h3></div>
                                        <div class="address-contact">Địa chỉ : {{$address->description}}, {{$address->ward->name}}, {{$address->district->name}}, {{$address->province->name}}, Việt Nam</div>
                                        <div class="phone-contact">Số điện thoại : {{$address->phone}}</div>
                                        <div>
                                            <form action="{{ route('checkout.payment') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $address->id }}" name="address_id">
                                                <button type="submit">Giao đến địa chỉ này</button>
                                            </form>
                                                <a>Xóa</a>
                                                <a>Sửa</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="add-address">
                                <p class="other">
                                    Bạn muốn giao hàng đến địa chỉ khác?
                                        <a href="#"  id="addNewAddress" data-toggle="modal" data-target="#addressModal">
                                            Thêm địa chỉ giao hàng mới
                                        </a>
                                </p>
                            </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-sm-12">
            <div class="features_items">
                <footer style="background:#F5F5F5">
                    <div class="footer">
                        <p>Bằng việc tiến hành Đặt Mua, khách hàng đồng ý với các Điều Kiện Giao Dịch Chung được ban hành bởi Eustass:</p>
                        <p>Quy chế hoạt động | Chính sách giải quyết khiếu nại | Chính sách bảo hành | Chính sách bảo mật thanh toán | Chính sách bảo mật thông tin cá nhân</p>
                        <p>© 2019 - Bản quyền của Công Ty Cổ Phần Eutass - Eutass.vn</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>

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
                    {{-- Login form --}}
                        <form action="{{route('address.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên người nhận</label>
                                <input type="text" class="form-control" name="name" value="{{ old('description') }}">
                            </div>
                            <div class="form-group">
                                <label for="number">Sđt người nhận</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('description') }}">
                            </div>
                            <div class="form-group">
                                <label for="province">Thành Phố</label>
                                <select id="province_id" class="form-control" name="province_id">
                                    @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district_id">Quận huyện</label>
                                <select id="district_id" class="form-control" name="district_id">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ward_id">Phường xã</label>
                                <select id="ward_id" class="form-control" name="ward_id">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Địa chỉ chi tiết</label>
                                <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                            </div>
                            <button class="btn btn-primary">Thêm địa chỉ</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
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

@endsection
