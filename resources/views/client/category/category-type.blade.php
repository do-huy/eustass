@extends('client.layouts.master')
@section('content')
<section>
<div class="container">
	<div class="row">
        <div class="col-sm-12 padding-right px-0">
            <div class="category-type"><!--category-type-->
                <div class="sibar-category-type"><!--sibar-category-type-->
                    <div style="text-transform: uppercase;font-weight: 700;font-size: 12px;">
                        Danh mục sản phẩm
                    </div>
                    <div style="font-weight: 550;font-size: 13px;">
                        {{ $categoryType->category->categoryMain->name }} ({{count($categoryType->category->categoryMain->products)}})
                    </div>

                    <div style="padding: 0 5px;font-size: 13px">
                        <a href="#">
                            {{ $categoryType->category->name }}  ({{count($categoryType->category->products)}})
                        </a>
                    </div>

                    <div style="padding: 0 15px;font-size: 13px">
                    <a href="#">
                           {{ $categoryType->name }} ({{count($categoryType->products)}})
                        </a>
                     </div>

                </div><!--sibar-category-type-->
                <div class="content-category-type"><!--content-category-type-->
                    <nav class="Breadcrumbs-product">
                         {{ Breadcrumbs::render('CategoryType',$categoryType) }}
                    </nav>
                    <div style="font-size: 17px;margin-top: 5px">
                        {{ $categoryType->name }} ({{count($categoryType->products)}} sản phẩm)
                    </div>

                    <div class="product-category-type">
                    @foreach($categoryType->products as $product)
                        <a href="#">
                        <div class="any-product-category-type">
                            <div class="text-center">
                                <div class="image" style="background-image: url('{{$product->image}}')"></div>
                                <h4 class="name-product-category-type">{{ Str::limit($product->name,22) }}</h4>
                                <span class="price-product-category-type"> {{number_format($product->price)}} </span>
                                <span class="price_product">đ</span>

                            </div>
                        </div>
                        </a>
                    @endforeach
                    </div>


                </div><!--content-category-type-->
            </div><!--category-type-->
        </div>
	</div>
</div>
</section>
@endsection
@section('script')
@endsection
