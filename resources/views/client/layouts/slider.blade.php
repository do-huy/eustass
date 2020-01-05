<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="grid-banner">
                    <div class="nav-left">
                        @foreach($categories as $category)
                            <ul class="navCate_1qlk">
                                <li class="cateMain_2WI2">
                                    <div class="cateMaintile_1rAT">
                                        <a href="#">{{$category->name}}</a>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
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
                    <div class="banner-right">
                        <div class="banner-img bg-image" style="background-image: url('../client/test.png')"></div>
                        <div class="banner-img bg-image" style="background-image: url('../client/3.png')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/slider-->
