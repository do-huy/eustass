@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">

        @if(session('Category'))
          <div class="alert alert-success">
            {{ session('Category') }}
          </div>
        @endif

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh sách thể loại chính</h4>
                <p class="card-category">List of category main</p>
              <a href="{{route('category_main.create')}}">
                  <p style="float: right;" class="card-category"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới thể loại chính</p>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Tên thể loại</th>
                      <th>Hình ảnh</th>
                      <th>Thao tác</th>
                    </thead>
                    <tbody>
                      @foreach($category_mains as $category_main)
                      <tr>
                        <td>{{$category_main->id}}</td>
                        <td>{{$category_main->name}}</td>
                        <td><img style="width:50px" src="/upload/CategoryMain/{{$category_main->image}}" /></td>
                        <td class="text-primary">
                        <a href="{{route('category_main.edit',[$category_main->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <form id="form" action="{{route('category_main.destroy',[$category_main->id])}}" method="POST">
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
      let conf = confirm('xóa?');
      if(conf){
        $('.destroy').parent().submit();
        }
      })
    </script>
@endsection
