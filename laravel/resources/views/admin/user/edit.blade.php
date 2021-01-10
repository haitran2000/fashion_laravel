@extends('admin.layout')
@section('content')
<div class="main-content" style="padding-top: 150px">
  <div class="col-md-4">
      <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
            <strong>Email:</strong>
            <input type="text" name="email" value="{{$user->email}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Password:</strong>
            <input type="text" name="password" value="{{$user->password}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" value="{{$user->name}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Phone:</strong>
            <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
          </div>
          <div class="form-group">
            <strong>Image:</strong>
            <input type="file" name="image" class="form-control" >
          </div>
          <div class="form-group">
              <input type="submit" value="Save" class="btn btn-primary" />
          </div>
      </form>
  </div>
</div>
<@stop
