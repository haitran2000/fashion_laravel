@extends('admin.layout')
@section('content')
<div class="main-content" style="padding-top: 150px">
  <div class="col-md-4">
      <form action="{{ route('banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
            <strong>Mô Tả:</strong>
            <input type="text" name="desc" value="{{$banner->desc}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Type:</strong>
            <input type="text" name="type" value="{{$banner->type}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Mô Tả:</strong>
            <input type="text" name="content" value="{{$banner->content}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Hình Ảnh:</strong>
            <input type="file" name="image" class="form-control" value="{{asset('images/'. $banner->image)}}">
          </div>
          <div class="form-group">
            <strong>Trạng Thái:</strong>
            <input type="text" name="status" value="{{$banner->status}}" class="form-control">
          </div>
          <div class="form-group">
              <input type="submit" value="Save" class="btn btn-primary" />
          </div>
      </form>
  </div>
</div>
<@stop
