@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">

        @if(session('Slide'))
          <div class="alert alert-success">
            {{ session('Slide') }}
          </div>
        @endif

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh sách thể loại</h4>
                <p class="card-category">List of category</p>
              <a href="{{route('slide.create')}}">
                  <p style="float: right;" class="card-category"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới thể loại</p>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Tên slide</th>
                      <th>Chủ đề</th>
                      <th>Nội dung</th>
                      <th>Hình ảnh</th>
                      <th>Thao tác</th>
                    </thead>
                    <tbody>
                     @foreach( $slides as $slide)
                      <tr>
                        <td>{{$slide->id}}</td>
                        <td>{{$slide->name}}</td>
                        <td>{{$slide->theme}}</td>
                        <td class="text-primary">{{$slide->content}}</td>
                        <td><img style="width:100px" src="/upload/slide/{{$slide->src}}" /></td>
                        <td class="text-primary">
                            <a href="{{route('slide.edit',[$slide->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                          <form id="form" action="{{route('slide.destroy',[$slide->id])}}" method="POST">
                          @method('DELETE')
                          @csrf
                            <i class="fa fa-trash-o destroy btn btn-danger" aria-hidden="true"></i>
                          </form>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection
@section('script')
<script>
  $('.destroy').click(function () {
  let conf = confirm('Bạn có chắc muốn xóa Slide này ???');
  if(conf){
    $('.destroy').parent().submit();
    }
  })
</script>
@endsection
