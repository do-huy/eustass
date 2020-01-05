<div class="col-sm-12">
    <div class="scoll-holren">
        <div class="slide-cate">
        @for ($i = 0; $i < 20; $i++)
            <div class="item-cate">
                <a href="{{route('category.detail',[isset($categories[$i*2])?$categories[$i*2]->id:''])}}">
                    <div class="cate1 cate">
                        <div class="cate-image" style="background-image: url('{{isset($categories[$i*2])?$categories[$i*2]->image:''}}')"></div>
                        <p>{{isset($categories[$i*2])?$categories[$i*2]->name:''}}<br></p>
                    </div>
                </a>
                <a href="{{route('category.detail',[isset($categories[$i*2+1])?$categories[$i*2+1]->id:''])}}">
                    <div class="cate2 cate">
                        <div class="cate-image" style="background-image: url('{{isset($categories[$i*2+1])?$categories[$i*2+1]->image:''}}')"></div>
                        <p>{{isset($categories[$i*2+1])?$categories[$i*2+1]->name:''}}<br></p>
                    </div>
                </a>

        </div>
        @endfor
    </div>
        <div class="to-left cate-control"><</div>
        <div class="to-right cate-control">></div>
    </div>
</div>
