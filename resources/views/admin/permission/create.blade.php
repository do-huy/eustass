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
            <h4 class="card-title">Thêm Quyền</h4>
            <p class="card-category">Add permission</p>
          </div>
          <div class="card-body">
          <form action="{{route('permission.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
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
                    <input type="text" name="name" class="form-control" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập tên thể loại')" oninput="setCustomValidity('')">
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary pull-right">Thêm Quyền</button>
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
@if(session('success'))
    <script>
        swal({
            title: "Cập nhập tài khoản thành công!",
            text: "Cảm ơn bạn đã sử dụng dịch vụ!",
            icon: "success",
            button: false,
            timer: 2000,
        });
    </script>
@endif
@endsection

