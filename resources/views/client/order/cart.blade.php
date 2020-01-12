@extends('client.layouts.master')

@section('content')
<section>
	<div class="container">
		<div class="row">
            @include('client.layouts.slider')
			<div class="col-sm-12 padding-right">
				<div class="features_items"><!--features_items-->
					<div class="col-sm-9">
                        <h2 class="title text-center">Danh sách giỏ hàng</h2>
						<div class="quan-list">
                            @auth
                                @foreach (Auth::user()->carts as $cart)
                                    <div class="siggle-product-cart">
                                        <div class="quan-product">
                                            <div class="quan-img">
                                                <img width="150" src="{{$cart->image}}" alt="">
                                            </div>
                                            <div class="detail">
                                                <span>{{$cart->name}} </span> </br>
                                                <span> Cửa hàng : <a>Eustass store</a> </span>
                                                <form action="{{route('cart.destroy',[$cart->product_id])}}" method="">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit">Xóa sản phẩm</button>
                                                </form>
                                                <button type="submit">Thêm vào danh sách mua sau</button>
                                            </div>
                                            <div class="quan-info">
                                                <span id="cart-total">{{number_format($cart->total)}}</span> đ </<span>
                                            </div>
                                            <div class="quan-control">
                                                <div class="quan-control-child">
                                                    <div class="desc control-cart" send_to="{{ route('cart.down', [$cart->product_id]) }}">-</div>
                                                    <div class="quantity" id="cart-amount"> {{ $cart->amount }}</div>
                                                    <div class="asc control-cart" send_to="{{ route('cart.up', [$cart->product_id]) }}" >+</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="underline mx-40">
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach
                            @endauth
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h2 class="title text-center">Thanh toán</h2>
                        <div class="cart-order-sum">
                            <h5 class="additional"><i class="fa fa-star-half-o" aria-hidden="true" style="color:red"></i> <b style="color:red">Eustass</b> </br>
                                <a href="https://www.facebook.com/eustasscungcaphanghoavavanchuyen/?modal=admin_todo_tour" target="_blank" class="view-shop">Facebook</a>
                            </h5>
                            <span>Thanh toán</span></br>
                            @auth
                                <div class="cart-sum">
                                    <b><span>Tổng tiền : <span id="cart-all">{{number_format(auth::user()->carts->sum('total'))}}</span> đ</span></b>
                                </div>
                            @endauth
                        </div>
                        <div  class="cart-order-sum-xn">
                            <a href="{{ route('checkout.shipping') }}" class="btn btn-defaultl cartt">Xác nhận đặt hàng</a>
                        </div>
                    </div>
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<script>
    var oldTIme = 0;

    $('.control-cart').click(function () {
        let quan_product = $(this).parent().parent().parent();
        let amount = quan_product.find('#cart-amount').text();
        let route = $(this).attr('send_to');
        let newTime = Date.now();
        if ($(this).text() == '-' && amount <=1) {
            return false;
        }
        if (newTime - oldTIme > 1000) {
            console.log('send');
            $.ajax({
                type: "GET",
                url: route,
                success: function (response) {
                    total = parseInt(response.total).toLocaleString();
                    amount = parseInt(response.amount).toLocaleString();
                    all = parseInt(response.all).toLocaleString();
                    sum_amount = parseInt(response.sum_amount).toLocaleString();
                    quan_product.find('#cart-total').text(total);
                    quan_product.find('#cart-amount').text(amount);
                    $('.header-name-number-new').text(sum_amount);
                    $('#cart-all').text(all);
                }
            });
            oldTIme = newTime;
        }
        return false;
    })
</script>
@endsection
