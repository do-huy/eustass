@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">

        @if(session('Product'))
          <div class="alert alert-success">
            {{ session('Product') }}
          </div>
        @endif

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh sách quyền</h4>
                <p class="card-category">List of permission</p>
              <a href="{{route('permission.create')}}">
                  <p style="float: right;" class="card-category"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới quyền</p>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Tên quyền</th>
                      <th>Ngày tạo</th>
                      <th>Thao tác</th>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                      <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }} </td>
                        <td>{{ $role->created_at }}</td>
                        <td class="text-primary">
                        <a href="{{route('permission.edit',[$role->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <form id="form" action="{{route('permission.destroy',[$role->id])}}" method="POST">
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
  {{-- <script>
    $('.destroy').click(function () {
      let conf = confirm('xóa?');
      if(conf){
        $('.destroy').parent().submit();
      }
    })
  </script> --}}

@if(session('destroys'))
<script>
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
</script>
@endif
@endsection
