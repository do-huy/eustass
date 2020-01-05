@extends('client.layouts.master')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                {{-- {{ Breadcrumbs::render('product',$product) }} --}}
                    <div style="margin-bottom: 20px;" class="features_items"><!--features_items-->

                        <div class="detai-product">

                            <div class="col-sm-5">

                                    <div class="image-content-product">
                                        <img class="size_product" src="{{$product->image}}" id="myimage" data-title="Hình ảnh" data-help="{{$product->name}}" alt="">
                                    </div>
                                    <div class="mousing-image">
                                        <span><i class="fas fa-search-plus"></i> Rê chuột để phóng to hình ảnh</span>
                                    </div>
                                    <div class="too-image-product">
                                        <section style="text-align: -webkit-center;" class="slider-product-all detail">
                                        @foreach($product->images as $products)
                                            <div class="size_product">
                                                <div class="col">
                                                    <img width="50px" src="{{$products->src}}" class="thumb" alt="" />
                                                </div>
                                            </div>
                                        @endforeach
                                        </section>
                                    </div>

                            </div>
                            <div class="col-sm-5">
                                <div class="content-product-detail">
                                    <nav class="Breadcrumbs-product">{{ Breadcrumbs::render('product',$product) }}</nav>
                                    <div class="name-content-product">{{ $product->name }}</div>
                                    <div class="price-content-product">{{ number_format($product->price) }} <sup>đ</sup></div>
                                    <div class="ping-content-product"> <i class="fas fa-shopping-cart"></i> (19) lượt mua </div>
                                    <div class="item_oXV2"><div class="ShippingMessage_1a3c" style="background-color: rgb(255, 244, 226);"><p class="info">Miễn phí vận chuyển cho đơn hàng có giá trị từ <strong class="value">100.000đ</strong> (tối đa đến <strong class="order">20.000đ</strong> tùy giá trị đơn hàng). <a href="#" target="_blank">Xem chi tiết</a></p></div></div>

                                    <div class="properties-content-product">
                                        <table class="table" class="dataTables_wrapper form-inline dt-bootstrap">
                                            <thead class="text-primary">
                                                <th class="properties_table">Thuộc tính</th>
                                                <th class="properties_table">Chi tiết thuộc tính</th>
                                            </thead>

                                            <tbody>
                                            @foreach($product->properties as $properies)
                                                <tr>
                                                <td class="detail_properties_table"> {{ $properies->name }} </td>
                                                <td class="detail_properties_table"> {{ $properies->description }} </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="note-content-product"> Ghi chú sản phẩm : {{ $product->note }} </div>
                                    <div class="all-button">
                                        <div class="btnCheckoutGroup_1AHp">
                                            <form  action="{{route('cart.store.detail',[$product->id])}}" method="POST">
                                            @csrf
                                            @auth
                                            <div class="TouchSpin">
                                                <span><i class="fab fa-dropbox"></i> Số lượng</span>
                                                <input id="demo3_22" type="text" class="input-sm" value="" name="amount">
                                            </div>

                                            <button class="btn btn-default btnCheckout"> <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>

                                            @else
                                            <button data-toggle="modal" data-target="#loginModal" class="btn btn-default btnCheckout"> <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>

                                            @endauth
                                            <button class="btn btn-default btnCheckout"> <i class="fas fa-heart"></i> Thêm vào sản phẩm ưa thích</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="introduce-product-detail">
                                    <div class="additional"><i class="fa fa-star-half-o" aria-hidden="true" style="color:red"></i> <b style="color:red">Eustass</b> </br>
                                        <a href="https://www.facebook.com/eustasscungcaphanghoavavanchuyen/?modal=admin_todo_tour" target="_blank" class="view-shop">Facebook</a>
                                    </div>
                                </div>
                            </div>

                            @auth
                            <div style="margin-top: 20px" class="col-sm-10">
                                <div class="well">
                                    <h4>Nhận xét về sản phẩm ...  <span class="glyphicon glyphicon-pencil"></span></h4>
                                    <form action="{{route('comment.post',[$product->id])}}" method="POST" role="form">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <textarea class="form-control" name="note" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">Bình luận</button>
                                    </form>
                                </div>
                            </div>
                            @endauth

                            <div class="col-sm-10">
                                @foreach($product->comments as $cm)
                                <div class="well">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="meida-object" src="/upload/avatars/{{ $cm->user->avatar}}" alt="" width="50px">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$cm->user->name}}
                                                <small>{{$cm->created_at}}</small>
                                            </h4>
                                            {{$cm->note}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div><!--features_items-->
				</div>
			</div>
		</div>
</section>
@endsection
@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="{{ asset('font/zoomsl.min.js') }}"></script>

<script>
        $('#myimage').imagezoomsl({
          zoomrange :[2,8],
          zoomstart : 4,
          magnifiereffectanimate:'fadeIn'

        });

        $('.thumb').click(function(){
          var vm=this;
          $('#myimage').fadeOut(600, function(){
            $(this).attr("src",$(vm).attr("src")).fadeIn(1000);
          });
          return false;
        });

</script>

<script>
    $(".slider-product-all").slick({
    dots: true,
    infinite:true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay:true,
    speed:300
    });
</script>

<script>
    $("input[name='amount']").TouchSpin({
        initval: 1
    });
</script>
@endsection
