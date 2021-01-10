@extends('admin.layout')
@section('content')
<div class="main-content" style="padding-top: 150px">
  <div class="col-md-12">
      <form data-select2-id="8" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="name">Tên:</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                  </div>
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="idcat">Category:</label>
                      <select name="category_id" class="form-control">
                          <option value=''>---Vui lòng chọn danh mục sản phẩm---</option>>
                          @foreach ($categories as $key =>$cat)
                              <option value="{{$cat->id}}">{{($key+1).'. '.$cat->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="idcat">Brands:</label>
                      <select name="brand_id" class="form-control" ">
                          <option value=''>---Vui lòng chọn danh mục nhãn hiệu---</option>>
                          @foreach ($brands as $key =>$cat)
                              <option value="{{$cat->id}}">{{($key+1).'. '.$cat->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="custom-file">
                      <label for="name">Mô Tả:</label>
                      <input type="text" class="form-control" id="desc" name="desc" value="{{$product->desc}}">
                  </div>
                  <div class="form-group">
                      <label for="content" style="padding-top: 20px;">Nội Dung:</label>
                      <textarea name=content id="content" cols="30" rows="10">{{$product->content}}</textarea>
                      {{--                                        <script>CKEDITOR.replace('contents');</script>--}}
                  </div>
                  <div class="custom-file">
                      <label for="name">Giá:</label>
                      <input type="number" class="form-control" id="price" name="price"value="{{$product->price}}">
                  </div>
                  <div class="form-group" style="padding-top: 20px">
                      <label>Trạng Thái:</label>
                      <select  class="form-control" name="status" id="statuss">
                          <option value="1">Kích Hoạt</option>
                          <option value="0">Chờ Kích Hoạt</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <strong>Hình Ảnh:</strong>
                      <input type="file" name="image" class="form-control" value="{{$product->image}}">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-success">Thêm Sản Phẩm</button>
                  </div>
              </div>
          </div> <!-- end card-->
      </form>
</div>
</div>
</div>
</div>
<!-- end row -->

</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
@endsection
