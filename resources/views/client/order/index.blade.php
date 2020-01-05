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
                        <span class="myprofile"><b>Đơn hàng của bạn</b></span>
                        <p>Quản lý thông tin đơn hàng để bảo mật tài khoản</p>
                    </div>
                    <div class="content-account">
                        <div class="gach-account"></div>
                        <div class="order-list">
                            <div class="order-list-1">
                                <div class="table-responsive">
                                    @foreach ($orders as $order)
                                        <div class="card pb-3">
                                            <div class="card-header">
                                                <div class="bill-info text-center" style="display: grid;grid-template-columns: 100px 100px 100px ;grid-gap: 30px">
                                                    <div class="id-bil">
                                                        <p>Mã đơn hàng</p>
                                                        <a href="#">
                                                        <p>{{ 'Eu-000000-'.$order->id }}</p>
                                                        </a>
                                                    </div>
                                                    <div class="order-date">
                                                        <p>Ngày mua</p>
                                                        <p>{{ $order->created_at }}</p>
                                                    </div>
                                                    <div class="total-price">
                                                        <p>Tổng tiền</p>
                                                        <p>{{ number_format($order->curent_price*$order->amount) }} đ</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="card-body">
                                                <div class="eustass-notification">
                                                    <span class="eustass-notification-content">
                                                        <i class="fas fa-bell"></i> Eustass đang xác nhận đơn hàng của bạn
                                                    </span>
                                                </div>
                                                <div class="product-bill">
                                                    <div class="image-detail-order">
                                                        <img src="{{ $order->product->image }}" alt="" width="100%">
                                                    </div>
                                                    <div class="info">
                                                        <div class="p-name">{{ $order->product->name }}</div>
                                                        <div class="p-price">{{ number_format($order->curent_price) }} đ</div>
                                                        <div class="p-amount">Số lượng : {{ $order->amount }}</div>
                                                    </div>
                                                    <div class="detail-detail">
                                                        <button class="btn btn-default btn-detail">Xem chi tiết đơn hàng</button>
                                                    </div>
                                                    <div class="detail-detail-1">
                                                        <button class="btn btn-default btn-tracing">Theo dõi đơn hàng</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-tablde-order">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary-order">
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày mua</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái đơn hàng</th>
                                </thead>
                                <tbody>
                                @foreach($billDetails as $billdetail)
                                    <tr>
                                        <td>{{ 'Eu-000000-'.$billdetail->id }}</td>
                                        <td>{{$billdetail->created_at}}</td>
                                        <td>{{$billdetail->product->name}}</td>
                                        <td >{{ number_format($billdetail->curent_price) }} đ</td>
                                        <td>{{$billdetail->amount}}</td>
                                        <td>{{$billdetail->status}}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <footer style="text-align: center">
                                <div>{{ $billDetails->links() }}</div>
                            </footer>
                        </div>
                    </div>
                </div>
			</div>
		</div>
    </div>
@endsection
@section('script')
@endsection


