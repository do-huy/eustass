@extends('admin.layouts.master')
@section('title')
  Store
@endsection
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/css/fileinput.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Thêm thể loại</h4>
            <p class="card-category">Add category</p>
          </div>
          <div class="card-body">
          <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
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
                    <label class="bmd-label-floating">Tên thể loại (Name's Category)</label>
                    <input type="text" name="name" class="form-control" required=""   oninvalid="this.setCustomValidity('Xin vui lòng nhập tên thể loại')" oninput="setCustomValidity('')">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tên thể loại chính (Name's Category Main)</label>
                    <select style="background:#202940" class="form-control" name="category_main_id">
                        @foreach($Category_mains as $Category_main)
                            <option value="{{$Category_main->id}}">{{$Category_main->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Hình ảnh</label>
                        <div class="form-group">
                        <input  type="file" id="file-1" name="src" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
                        </div>
                      </div>
                    </div>
              </div>

              <button type="submit" class="btn btn-primary pull-right">Thêm thể loại</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/themes/fa/theme.js"></script>
<script>
        $("#file-1").fileinput({
          theme:'fa',
          uploadUrl:"/image-submit",
          uploadExtraData:function () {
            return {
              _token:$("input[name='_token']").val()
            };
          },
          allowedFileExtensions:['jpg','png','gif'],
          overwriteInitial:false,
          maxFileSize:2000,
          maxFileNum:8,
          slugCallback:function (filename) {
            return filename.replace('(','_').replace(']','_');
          }
        });
    </script>

@endsection
