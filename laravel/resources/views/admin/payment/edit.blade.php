@extends('admin.layout')
@section('content')
<div class="main-content" style="padding-top: 150px">
  <div class="col-md-12">
      <form action="{{ route('payment.update',$payment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
            <strong>Tên Loại:</strong>
            <input type="text" name="name" value="{{$payment->name}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Trạng Thái:</strong>
            <input type="text" name="status" value="{{$payment->status}}" class="form-control">
          </div>
          <div class="form-group">
              <input type="submit" value="Save" class="btn btn-primary" />
          </div>
      </form>
  </div>
</div>
<@stop
