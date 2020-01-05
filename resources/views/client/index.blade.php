@extends('client.layouts.master')

@section('content')

<section>
    <div class="container">
        <div class="row">
            {{-- {{ Breadcrumbs::render('home') }} --}}
            <!--include-->
            @include('client.layouts.slider')
            @include('client.layouts.sidebar')
            <!--/include-->

			<div class="col-sm-12 padding-right px-0">
                <div class="features_items"><!--features_items-->
                    <div class="col-sm-12">
                        <img width="100%" src="../upload/image/test.jpg">
                    </div>
                </div><!--features_items-->

				<div class="features_items"><!--product-->
                    <h2 class="title text-center">Các sản phẩm mới</h2>
                    <div class="col-sm-12">
                        <p style="font-size:15px">{{ $search_msg }}</p>
					</div>
					<div class="list-product">
                        @foreach($products as $product)

                                <div class="siggle-product">
                                    <a href="{{route('product.detail',[$product->slug])}}">
                                    <div class="text-center">
                                        <div class="image" style="background-image: url('{{$product->image}}')"></div>
                                                {{-- <h2> {{number_format($product->price)}} đ</h2> --}}
                                        <h4 class="name_product">{{ Str::limit($product->name,22) }}</h4>
                                        <span class="price_product"> {{number_format($product->price)}} </span>
                                        <span class="price_product">đ</span>
                                        <form class="form-add-product" action="{{route('cart.store',[$product->id])}}" method="POST">
                                            @auth
                                                <button  type="submit" class="btn btn-default add-to-cart btn-cart"><i class="fa fa-shopping-cart"></i>Chọn mua</button>
                                            @else
                                                <button data-toggle="modal" data-target="#loginModal"  type="button" class="btn btn-default add-to-cart btn-cart"><i class="fa fa-shopping-cart"></i>Chọn mua</button>
                                            @endauth
                                        </form>
                                        <img src="../upload/image/new.png" class="new" alt="" />
                                    </div>
                                    </a>
                                    <div class="choose">
                                        <i class="fa fa-plus-square"></i> Danh sách ưa thích
                                    </div>
                                </div>

						@endforeach
					</div>
                </div><!--/product-->

				<div class="recommended_items"><!--product_like-->
					<h2 class="title text-center">Sản phẩm được ưa thích</h2>
					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <section class="slider-area slider">
                            @foreach($products as $product)
								<div class="col-sm-4">
									<div class="single-products text-center">
                                        <img class="like-image" src="{{$product->image}}" alt="" />
                                        <h4 class="name_product">{{ Str::limit($product->name,30)}}</h4>
                                        <p>{{number_format($product->price)}} đ</p>
                                            <button  type="submit" class="btn btn-default add-to-cart btn-cart"><i class="fa fa-shopping-cart"></i>Chọn mua</button>
									</div>
                                </div>
                            @endforeach
                        </section>
						<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
                </div><!--/product_like-->
            </div>

        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    var a = 0;
    $('.to-left').hide();
    $('.to-right').click(function () {
        a-=1140;
        $('.to-left').show();
        $('.to-right').hide();
        $('.slide-cate').css('margin-left',`${a}px`);
    })
    $('.to-left').click(function () {
        a+=1140;
        $('.to-right').show();
        $('.to-left').hide();
        $('.slide-cate').css('margin-left',`${a}px`);
    })
</script>
<script>
    $(".slider-area").slick({
    infinite:true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    arrows:false,
    centerMode:true,
    centerPadding:'0',
    });
</script>
@endsection
