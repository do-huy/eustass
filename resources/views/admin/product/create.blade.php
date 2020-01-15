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
          <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Sản phẩm (Product)</label>
                    <input type="text" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tên sản phẩm</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Thể loại chính</label>
                      <select id="category_main_id" style="background:#202940" class="form-control" name="category_main_id">
                          @foreach($category_mains as $category_main)
                              <option value="{{$category_main->id}}">{{$category_main->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Danh mục thể loại</label>
                      <select id="category_id" style="background:#202940" class="form-control" name="category_id">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Loại thể loại</label>
                      <select id="category_type_id" style="background:#202940" class="form-control" name="category_type_id">
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Số kg</label>
                    <input type="number" name="weight" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Số lượng</label>
                      <input type="number" name="amount" class="form-control">
                    </div>
                  </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Giá sản phẩm</label>
                    <input type="number" name="price" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Ghi chú</label>
                    <div class="form-group">
                      <label class="bmd-label-floating"> Ghi chú chi tiết về sản phẩm.</label>
                      <textarea name="note" class="form-control" rows="5"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Hình ảnh</label>
                    <div class="form-group">
                    <input  type="file" id="file-1" name="src[]" multiple class="file" data-overwrite-initial="false" >
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
                        <textarea name="description" class="form-control" id="ckeditor"></textarea>
                        </div>
                        </div>
                      </div>
                    </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Thêm sản phẩm</button>
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
          row.closest('tr').style.display = 'none';
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
<script type="text/javascript">
    var category_mains = {!! json_encode($category_mains->toArray()) !!};
    var categories = [];
    // var TypeCategorys = [];

    writeCategory(category_mains);
    // writeCategoryType(categories);

    $('#category_main_id').change(function () {
        writeCategory(category_mains);
        // writeCategoryType(categories);
    });

    // $('#category_id').change(function () {
    //     writeCategoryType(categories);
    // });

    function writeCategory(category_mains) {
        let p = category_mains.filter(category_main => category_main.id == $('#category_main_id').val());
        categories = p[0].categories;
        $('#category_id').empty();
        categories.forEach(catogory => {
            let html = `<option value="${catogory.id}">${catogory.name}</option>`;
            $('#category_id').append(html);
        });
    }



</script>
@endsection
