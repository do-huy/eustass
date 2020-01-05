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
                <h4 class="card-title ">Danh sách danh mục thể loại</h4>
                <p class="card-category">List of all category</p>
              <a href="{{route('category_type.create')}}">
                  <p style="float: right;" class="card-category"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới danh mục thể loại</p>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Tên danh mục thể loại</th>
                      <th>Thể loại</th>
                      <th>Thao tác</th>
                    </thead>
                    <tbody>
                    @foreach($category_types as $category_type)
                      <tr>
                        <td>{{$category_type->id}}</td>
                        <td>{{$category_type->name}}</td>
                        <td>{{$category_type->category->name}}</td>
                        <td class="text-primary">
                        <a href="{{route('category_type.edit',[$category_type->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <form id="form" action="{{route('category_type.destroy',[$category_type->id])}}" method="POST">
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

