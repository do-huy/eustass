@extends('client.layouts.master')
@section('content')
<section>
<div class="container">
	<div class="row">
        <div class="col-sm-12 padding-right px-0">
            <div class="category-main"><!--category-main-->
                <div class="sibar-category-main"><!--sibar-category-main-->
                    <div style="text-transform: uppercase;font-weight: 700;font-size: 12px;">
                        Danh mục sản phẩm
                    </div>
                    <div style="font-weight: 550;font-size: 13px;">
                        {{ $category_mains->name }} ({{count($category_mains->products)}})
                    </div>
                    @foreach($category_mains->categories as $category)
                    <div style="padding: 0 15px;font-size: 13px">
                        <a href="#">
                            {{ $category->name }} ({{count($category->products)}})
                        </a>
                     </div>
                    @endforeach
                </div><!--sibar-category-main-->
                <div class="content-category-main"><!--content-category-main-->
                    <nav class="Breadcrumbs-product">
                        {{ Breadcrumbs::render('CategoryMain',$category_mains) }}
                    </nav>
                    <div style="font-size: 17px;margin-top: 5px">
                        {{ $category_mains->name }} ({{count($category_mains->products)}} sản phẩm)
                    </div>

                    <div class="product-category-main">

                        <div>
                            a
                        </div>
                        <div>
                            a
                        </div>
                        <div>
                            a
                        </div>
                        <div>
                            a
                        </div>
                        <div>
                            a
                        </div>

                    </div>


                </div><!--content-category-main-->
            </div><!--category-main-->
        </div>
	</div>
</div>
</section>
@endsection
@section('script')
@endsection
