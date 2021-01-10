@extends('admin.layout')
@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-flex align-items-center justify-content-between">
                      <h4 class="mb-0 font-size-18">Add Category</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                              <li class="breadcrumb-item active">Add Category</li>
                          </ol>
                      </div>

                  </div>
              </div>
          </div>
          <!-- end page title -->

          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">

                          <h4 class="card-title">Basic Information</h4>
                          <p class="card-title-desc">Fill all information below</p>
                          <form data-select2-id="8" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                      </div>
                                      <div class="custom-file">
                                        <label for="name">Desc:</label>
                                        <input type="text" class="form-control" id="desc" name="desc">
                                      </div>
                                      <div class="form-group">
                                        <label for="name" style="padding-top: 20px;">Status:</label>
                                        <input type="text" class="form-control" id="statuss" name="status">
                                      </div>
                                      <div class="form-group">
                                        <strong>Image:</strong>
                                        <input type="file" name="image" class="form-control" >

                                      </div>
                                      <div class="form-group">
                                        <button type="submit" class="btn btn-success">Add Category</button>
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
