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
                <h4 class="card-title ">Danh sách tài khoản</h4>
                <p class="card-category">List of account</p>
              <a href="{{route('account.create')}}">
                  <p style="float: right;" class="card-category"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới tài khoản</p>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Tên tài khoản</th>
                      <th>Số điện thoại</th>
                      <th>Gmail</th>
                      <th>Chức vụ</th>
                      <th>Thao tác</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->number }}</td>
                        <td>{{ $user->email }}</td>
                        <td>admin</td>
                        <td class="text-primary">
                            <a href="" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                          <form id="form" action="" method="POST">
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

@endsection
