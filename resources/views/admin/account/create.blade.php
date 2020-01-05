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
            <h4 class="card-title">Thêm tài khoản</h4>
            <p class="card-category">Add user</p>
          </div>
          <div class="card-body">
          <form action="{{route('account.store')}}" method="post">
            {{ csrf_field() }}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tài khoản (Account)</label>
                    <input type="text" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tên tài chủ khoản</label>
                    <input type="text" name="name" class="form-control" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập tên thể loại')" oninput="setCustomValidity('')">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Số điện thoại</label>
                    <input type="number" name="number" class="form-control" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập tên thể loại')" oninput="setCustomValidity('')">
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Gmail</label>
                      <input type="gmail" name="email" class="form-control" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập tên thể loại')" oninput="setCustomValidity('')">
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập tên thể loại')" oninput="setCustomValidity('')">
                  </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nhập lại mật khẩu</label>
                      <input type="password" name="password" class="form-control" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập tên thể loại')" oninput="setCustomValidity('')">
                    </div>
                  </div> --}}
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Chức vụ</label>
                      <select style="background:#202940" class="form-control" name="role_id">
                          @foreach($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary pull-right">Thêm tài khoản</button>
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
