<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="grid-banner">
                    <div class="nav-left">
                        <ul class="navCate_1qlk">
                            @foreach($category_mains as $category_main)
                                <li class="cateMain_2WI2 position-relative">
                                    <a href="{{route('category.main.client',[$category_main->id])}}" class="link-cate-efuIbv">
                                        <span class="icon-wrap">
                                            <i class="fas fa-align-center"></i>
                                        </span>
                                        <span class="text-wrap">
                                            {{$category_main->name}}
                                        </span>
                                    </a>
                                    <div class="cate-sub-menu ">
                                        @foreach($category_main->categories as $category)
                                        <div class="content_categories">
                                            <div class="content_name_category">{{ $category->name }}</div>
                                            <ul>
                                                @foreach($category->typeCategories as $categoryType)
                                                <li>
                                                    <a class="active" href="{{route('category.view.client',[$categoryType->id])}}">{{ $categoryType->name }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--center-->
                    <div class="nav-center">
                        <!--center1-->
                    <div id="slider-carousel" class="carousel slide banner-left" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $i=0;?>
                                @foreach($slides as $slide)
                                    <li data-target="#slider-carousel" data-slide-to="{{$i}}"
                                        class="{{($i==0)?'active':''}}">
                                    </li>
                                <?php $i++; ?>
                                @endforeach
                        </ol>

                        <div class="carousel-inner">
                            <?php $i=0 ?>
                                @foreach($slides as $slide)
                                <div class="item {{($i==0)?'active':''}}">
                            <?php $i++; ?>
                            <div class="carousel-content">
                                <h1 style="color:#fff;display: none"><span>$</span>-Eustass</h1>
                                <h2 style="color:#fff;display: none">{{$slide->theme}}</h2>
                                <p style="color:#fff;display: none"> {{$slide->content}} </p>
                                {{-- <button type="button" class="btn btn-default get">Đăng ký cửa hàng trên Eustass</button> --}}
                            </div>
                            <div class="carousel-image bg-image" style="background-image: url('/upload/slide/{{ $slide->src}}')">
                            </div>
                            </div>
                            @endforeach
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <!--/center1-->
                    <!--center2-->
                    {{-- <div class="nav-center-2">
                        <div class="conten-nav-center-2"></div>
                        <div class="conten-nav-center-2"></div>
                    </div> --}}
                    <!--/center2-->
                    </div><!--/center-->
                    <div class="banner-right">
                        <div class="banner-img bg-image" style="background-image: url('../client/test.png')"></div>
                        <div class="banner-img bg-image" style="background-image: url('../client/test.png')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/slider-->
