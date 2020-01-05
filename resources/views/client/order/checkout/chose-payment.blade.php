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
                    <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
						<div class="col-sm-9">
                            <h2 class="titlel">1. Hình thức thanh toán</h2>
                                {{-- <div class="form-group">
                                    <label>Thanh toán khi nhận hàng</label>
                                    <input type="checkbox" name="payment" class="form-control">
                                </div> --}}
                                <div class="payment-pay">
                                    <input type="radio" name="payment" checked value="COD"> Thanh toán tiền mặt khi nhận hàng<br>
                                    <input type="radio" name="payment" value="Visa"> Thanh toán bằng thẻ quốc tế Visa, Master, JCB<br>
                                    <input type="radio" name="payment" value="Atm"> Thẻ ATM nội địa/Internet Banking (Miễn phí thanh toán)<br>
                                    <input type="radio" name="payment" value="Momo"> Thanh toán bằng ví MoMo - Chi tiết
                                </div>
                                <div class="form-group">
                                    <label for="note"></label>
                                    <textarea class="form-control" name="note" id="note" cols="30" rows="10" placeholder="Ghi chú về đơn hàng" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập ghi chú')" oninput="setCustomValidity('')"></textarea>
                                </div>

                        </div>

                        <div class="col-sm-3 ">
                            <h2 class="titlel-tt">Thanh toán</h2>
                            <div class="payment-order-sum">
                                    <div class="payment-content text-center">
                                        <span>Địa chỉ giao hàng</span>
                                    </div>

                                    <div class="payment-sum">
                                        Địa chỉ : <span >{{$address->full}}</span>
                                        <p>Sdt: {{$address->phone}}</p>
                                    </div>
                            </div>

                            <div class="payment-order-sum">
                                    <div class="payment-content text-center">
                                        <span>Danh sách đơn hàng</span>
                                    </div>
                                    @foreach(Auth::user()->carts as $cart)
                                    <div class="payment-sum">
                                       <span >{{$cart->amount}} x <a>{{$cart->name}}</a></span> </br>
                                       <span >Cung cấp bởi : Eustass</span>
                                    </div>
                                    @endforeach
                            </div>

                            <div class="payment-order-sum">
                                    <div class="payment-content text-center">
                                            <span>Chi phí thanh toán</span>
                                    </div>
                                    <div class="payment-sum">
                                        <div>
                                            <span> Tạm tính {{number_format(Auth::user()->carts->sum('total'))}} đ</span>
                                        </div>
                                        <div class="pvc-payment">
                                            <span> Phí vận chuyển: 20,000 đ  </span>
                                        </div>
                                        <div class="sum-payment">
                                            <span> Thành tiền: {{number_format(Auth::user()->carts->sum('total'))}} đ  </span>
                                        </div>
                                        <div class="vat-payment">
                                            <span>(Đã bao gồm vat)</span>
                                        </div>
                                    </div>
                            </div>

                            <div  class="cart-order-sum-xn">
                                    <button class="btn btn-defaultl cartt" type="submit">Đặt mua</button>
                            </div>

                        </div>


                    </div><!--features_items-->
                    </form>
				</div>
			</div>
		</div>
</section>
@endsection
@section('script')

@endsection
