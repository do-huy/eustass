@extends('admin.layouts.master')
@section('title')
  Store
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Thêm thể loại</h4>
            <p class="card-category">category catalog</p>
          </div>
          <div class="card-body">
          <form action="{{route('category_type.update',[$category_types->id])}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Thể loại (Product)</label>
                    <input type="text" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tên danh mục thể loại</label>
                    <input type="text" name="name" value="{{$category_types->name}}" class="form-control" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập tên thể loại')" oninput="setCustomValidity('')">
                  </div>
                </div>
              </div>
              <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Thể loại</label>
                            <select style="background:#202940" class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option {{$category_types->category_id == $category->id?'selected':''}}
                                    value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                      </select>
                          </div>
                    </div>
              </div>

              <button type="submit" class="btn btn-primary pull-right">Sửa thể loại</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="../assets/img/faces/marc.jpg" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category">CEO / Co-Founder</h6>
            <h4 class="card-title">Alec Thompson</h4>
            <p class="card-description">
              Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
            </p>
            <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')


@endsection
