@extends('admin.layout')
@section('content')
<div class="main-content" style="padding-top: 150px">
  <div class="col-md-4">
      <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
            <strong>Tên Loại:</strong>
            <input type="text" name="name" value="{{$category->name}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Mô Tả:</strong>
            <input type="text" name="desc" value="{{$category->desc}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Hình Ảnh:</strong>
            <input type="file" name="image" class="form-control" value="{{asset('images/'. $category->image)}}">
          </div>
          <div class="form-group">
            <strong>Trạng Thái:</strong>
            <input type="text" name="status" value="{{$category->status}}" class="form-control">
          </div>
          <div class="form-group">
              <input type="submit" value="Save" class="btn btn-primary" />
          </div>
      </form>
  </div>
</div>
<@stop
