@extends('admin.layouts.master')
@section('title')
  Dash - Đỗ Huy
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
            <h4 class="card-title">Thêm sản phẩm</h4>
            <p class="card-category">Add products</p>
          </div>
          <div class="card-body">
          <form action="{{route('product.update',[$product->id])}}" method="post" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Sản phẩm (Product)</label>
                    <input type="text" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tên sản phẩm</label>
                      <input type="text" name="name" value="{{$product->name}}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Thể loại</label>
                      <select style="background:#202940" class="form-control" name="category">
                          @foreach($categories as $category)
                              <option {{$product->category_id == $category->id?'selected':''}}
                              value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Số kg</label>
                    <input type="number" name="weight" value="{{$product->weight}}" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Số lượng</label>
                      <input type="number" name="amount" value="{{$product->amount}}" class="form-control">
                    </div>
                  </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Giá sản phẩm</label>
                    <input type="number" name="price" value="{{$product->price}}" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Ghi chú</label>
                    <div class="form-group">
                      <label class="bmd-label-floating"> Ghi chú chi tiết về sản phẩm.</label>
                      <textarea name="note" class="form-control" rows="5">{{$product->note}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Hình ảnh</label>
                    <div class="form-group">
                        <input  type="file" id="file-1" value="" name="src[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">

                            <img style="height:70px ; width:70px" src="{{ $product->image }}" />
                            @foreach($product->images as $image)
                            <img style="height:70px ; width:70px" src="{{ $image->src }}" />
                            @endforeach

                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <label class="bmd-label-floating">Thuộc tính sản phẩm (Product attributes) (*)</label>
                    <div style="text-align:right">
                    <button class="btn btn-success" type="button" onclick="toAddRow()">Thêm thuộc tính </button>
                    </div>
                      <table class="table table-bordered table-striped" id="user_table">
                        <thead>
                          <tr>
                            <th width="35%">Tên thuộc tính </>
                            <th width="35%">Mô tả chi tiết thuộc tính </th>
                            <th width="30%">Thao tác</th>
                          </tr>
                        </thead>
                        <tbody id="body_table">
                            @foreach ($product->properties as $property)
                                <tr>
                                    <td><input name="key[]" class="form-control" value="{{ $property->name }}"></td>
                                    <td><input name="value[]" class="form-control" value="{{ $property->description }}"></td>
                                    <td><button class="btn btn-danger" type="button" onclick="toDeleteRow(this)">Xóa Thuộc tính</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
              </div>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Mô tả</label>
                        <div class="form-group">
                        <label class="bmd-label-floating"> Mô tả chi tiết sản phẩm</label>
                        <div class="form-group">
                        <textarea name="description" class="form-control" id="ckeditor">{{$product->description}}</textarea>
                        </div>
                        </div>
                      </div>
                    </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Sửa sản phẩm</button>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/themes/fa/theme.js"></script>

<script>
    CKEDITOR.replace( 'ckeditor' );
</script>

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

<script>
        function toDeleteRow(row)
        {
          row.closest('tr').remove();
        }

        function toAddRow()
        {
          let rowAdd =`<tr>
                        <td><input class="form-control" name="key[]"></td>
                        <td><input class="form-control" name="value[]"></td>
                        <td><button class="btn btn-danger" type="button" onclick="toDeleteRow(this)">Xóa thuộc tính</button></td>
                      </tr>`;
          $('#body_table').append(rowAdd);
        }
</script>

@endsection
