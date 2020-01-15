@extends('client.layouts.master')

@section('content')
<section>
		<div class="container">
			<div class="row">
                @include('client.layouts.slider')

                <div class="col-sm-12 padding-right px-0">
                    <div class="container">
                     {{ Breadcrumbs::render('category',$category) }}
                    </div>
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Loại Danh mục ( {{ $category->name }} ) <sup>{{count($products)}} Sản phẩm</sup></h2>

                            <div class="list-product">
                                @foreach($products as $product)
                                        <a href="{{route('product.detail',[$product->slug])}}">
                                            <div class="siggle-product">
                                                <div class="text-center">
                                                    <div class="image" style="background-image: url('{{$product->image}}')"></div>
                                                    {{-- <h2> {{number_format($product->price)}} đ</h2> --}}
                                                    <h4>{{$product->name}}</h4>
                                                    <span> {{number_format($product->price)}} </span>
                                                    <span>đ</span>
                                                    <form class="form-add-product" action="{{route('cart.store',[$product->id])}}" method="POST">
                                                        @auth
                                                            <button  type="submit" class="btn btn-default add-to-cart btn-cart"><i class="fa fa-shopping-cart"></i>Chọn mua</button>
                                                        @else
                                                            <button data-toggle="modal" data-target="#loginModal"  type="button" class="btn btn-default add-to-cart btn-cart"><i class="fa fa-shopping-cart"></i>Chọn mua</button>
                                                        @endauth
                                                    </form>
                                                    <img src="../upload/image/new.png" class="new" alt="" />
                                                </div>
                                                <div class="choose">
                                                    <i class="fa fa-plus-square"></i> Chức năng khác
                                                </div>
                                            </div>
                                        </a>
                                @endforeach
                            </div>
                        </div><!--features_items-->
                    </div>
			</div>
		</div>
</section>
@endsection
@section('script')

@endsection
