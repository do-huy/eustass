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
            <h4 class="card-title">Sửa Quyền</h4>
            <p class="card-category">Edit permission</p>
          </div>
          <div class="card-body">
          <form action="{{route('permission.update',[$roles->id])}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Quyền (permission)</label>
                    <input type="text" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tên Quyền (Name's permission)</label>
                    <input type="text" name="name" value="{{$roles->name}}" class="form-control" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập tên thể loại')" oninput="setCustomValidity('')">
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary pull-right">Sửa Quyền</button>
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

