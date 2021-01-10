@extends('admin.layout')
@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-flex align-items-center justify-content-between">
                      <h4 class="mb-0 font-size-18">Khách Hàng</h4>
                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                              <li class="breadcrumb-item active">Khách Hàng</li>
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
                          <div class="row mb-2">
                              <div class="col-sm-4">
                                  <div class="search-box mr-2 mb-2 d-inline-block">
                                      <div class="position-relative">
                                          <input type="text" class="form-control" placeholder="Search...">
                                          <i class="bx bx-search-alt search-icon"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="table-responsive">
                              <table class="table table-centered table-nowrap">
                                  <thead class="thead-light">
                                      <tr>
                                          <th style="width: 20px;">
                                              <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                  <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                              </div>
                                          </th>
                                          <th>Tên Khách Hàng</th>
                                          <th>Điện Thoại </th>
                                          <th>Địa Chỉ</th>
                                          <th>Tỉnh/Thành Phố</th>
                                          <th>Xoá</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($customers ?? '' as $customer)
                                        @if($customer->level==0)
                                            {
                                          <tr>
                                              <td>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                      <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                  </div>
                                              </td>
                                              <td>{{$customer->name}}</td>
                                                <td><i class="fa fa-phone" aria-hidden="true"></i>{{$customer->phone}}</td>
                                              <td>
                                                  <span class="badge badge-pill badge-soft-success font-size-12">{{$customer->address}}</span>
                                              </td>
                                              <td>
                                                   {{$customer->city}}
                                              </td>
                                              <td>
                                                  <form action="{{ route('customer.destroy',$customer->id) }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                  </form>

                                              </td>
                                          </tr>
                                            }
                                        @endif
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                          <ul class="pagination pagination-rounded justify-content-end mb-2">
                              <li class="page-item disabled">
                                  <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                      <i class="mdi mdi-chevron-left"></i>
                                  </a>
                              </li>
                              <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                              <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                              <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                              <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                              <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                              <li class="page-item">
                                  <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                      <i class="mdi mdi-chevron-right"></i>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <!-- end row -->
      </div> <!-- container-fluid -->
  </div>
  <!-- End Page-content -->
@stop
