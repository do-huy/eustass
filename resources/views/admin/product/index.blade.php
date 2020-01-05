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
                <h4 class="card-title ">Danh sách sản phẩm</h4>
                <p class="card-category">List of products</p>
              <a href="{{route('product.create')}}">
                  <p style="float: right;" class="card-category"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới sản phẩm</p>
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Thông tin sản phẩm</th>
                      <th>Thể loại</th>
                      <th>Thuộc tính</th>
                      <th>Hình ảnh</th>
                      <th>Thao tác</th>

                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>
                          Tên sản phẩm : {{$product->name}} <br>
                          <span class="text-primary">Trọng lượng : {{$product->weight}} (Kg) </span><br>
                          Số lượng : {{$product->amount}} <br>
                          <span class="text-primary">Giá tiền : {{number_format($product->price)}} đ </span>
                        </td>
                        <td>{{$product->category->name}}</td>
                        <td>
                          @foreach($product->properties as $property)
                           <div> {{ $property->name }} : {{ $property->description }} </div>
                          @endforeach
                        </td>
                        <td>
                            <img style="height:50px ; width:50px" src="{{ $product->image }}" />
                        </td>
                        <td class="text-primary">
                          <div><a class="btn btn-info btn-xs">Mới tạo</a></div>
                        <a href="{{route('product.edit',[$product->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <form id="form" action="{{ route('product.destroy', [$product->id]) }}" method="POST">
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
