@extends('client.layouts.master2')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('font/css/chose-address.css')}}">
@endsection
@section('content')
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
                    <div class="features_items"><!--features_items-->
                        <div class="k-display">

                            <div class="col-sm-3">
                                <img src="../upload/success/success.png" width="100%">
                            </div>

						    <div class="col-sm-9">
                                <div class="payment-pay-display">
                                    <p class="thanks">Cảm ơn bạn đã mua hàng ở Eustass !</p>
                                    <p> <i class="fa fa-clock-o" aria-hidden="true"></i> Giao hàng tiêu chuẩn: thời gian giao hàng sau 2h thời gian được tính khi đặt hàng thành công - giao cả ngày Thứ Bảy & Chủ Nhật.</p>
                                    <p> <i class="fa fa-info-circle" aria-hidden="true"></i> Thông tin chi tiết về đơn hàng đã được gửi đến tài khoản <a>{{Auth::user()->email}}</a>. Nếu không tìm thấy đơn hàng vui lòng kiểm tra trong lịch sử đơn hàng của bạn hoặc liên hệ tổng đài Eustass để được hỗ trợ.</p>
                                    <div class="fast-display">
                                        <p> <i class="fa fa-fighter-jet" aria-hidden="true" style="color:#33ccff"></i> Nhằm giúp việc xử lý đơn hàng nhanh hơn nữa, Eustass sẽ không gọi điện cho bạn để xác nhận đơn hàng.</p>
                                    </div>
                                    <div class="go-btn">
                                        <a href="{{route('home')}}" >
                                        <button class="btn btn-defaultl cartt"> Tiếp tục mua hàng</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!--features_items-->

				</div>
			</div>
		</div>
</section>
@endsection
@section('script')

@endsection
