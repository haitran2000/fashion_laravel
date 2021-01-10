
@extends('admin.layout')
@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-flex align-items-center justify-content-between">
                      <h4 class="mb-0 font-size-18">Sản Phẩm</h4>
                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                              <li class="breadcrumb-item active">Sản Phẩm</li>
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
                              <div class="col-sm-8">
                                  <div class="text-sm-right">
                                      <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i><a href="{{route('product.create')}}">Thêm Mới</a></button>
                                  </div>
                              </div><!-- end col-->
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
                                          <th>Tên </th>
                                          <th>Hình Ản</th>
                                          <th>Loại</th>
                                          <th>Giá</th>
                                          <th>Trạng Thái</th>
                                          <th>Xem Sản Phẩm</th>
                                          <th>Sửa</th>
                                          <th>Xoá</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($products ?? '' as $product)
                                          <tr>
                                              <td>
                                                  <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                      <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                  </div>
                                              </td>
                                              <td>{{$product->name}}</td>
                                              <td>
                                                <img src="{{asset('images/'. $product->image)}}" width="70" />
                                              </td>
                                              <td>
                                                @foreach ($categorys as $category)
                                                @if($product->category_id==$category->id)
                                                    {{$category->name}}
                                                @endif

                                                @endforeach
                                              </td>
                                              <td>
                                                {{number_format($product->price) }} VNĐ
                                              </td>
                                              <td>
                                                  @if($product->status == 1)
                                                      <form action="{{ route('completedUpdate', $product->id) }}" method="POST">
                                                          {{ csrf_field() }}
                                                          <button type="submit"  class="btn btn-warning" name="changeStatus" value="0"><i class="fa fa-lock"></i></button>
                                                      </form>
                                                  @else
                                                      <form action="{{ route('completedUpdate', $product->id) }}" method="POST">
                                                          {{ csrf_field() }}
                                                          <button type="submit" class="btn btn-warning" name="changeStatus" value="1"><i class="fa fa-unlock"></i></button>
                                                      </form>
                                                  @endif


                                              </td>
                                              <td>
                                                  <a href="{{route('product.detail', $product->id)}}" class="btn btn-warning">
                                                      <i class="fa fa-eye" aria-hidden="true"></i>
                                                  </a>
                                              </td>
                                              <td>
                                                  <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary">
                                                      <i class="fa fa-edit"></i>
                                                  </a>

                                              </td>
                                              <td>
                                                  <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                  </form>
                                              </td>
                                          </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                          <br>
                          <ul class="pagination pagination-rounded justify-content-end mb-2">
                              {{ $products->links()}}
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <!-- end row -->
      </div> <!-- container-fluid -->
  </div>
  <!-- End Page-content -->
  <!-- Modal -->

@stop
