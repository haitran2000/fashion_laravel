@extends('admin.layout')
@section('content')
    <div class="main-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Chi Tiết Sản Phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                            <li class="breadcrumb-item active">Chi Tiết Sản Phẩm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="product-detai-imgs">
                                    <div class="row">
                                        <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                    <div>
                                                        <img src="assets\images\product\img-7.png" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade active show" id="product-2" role="tabpanel" aria-labelledby="product-2-tab">
                                                    <div>
                                                        <img src="{!! asset('images/'.$product->image)!!}" alt="" class="img-fluid mx-auto d-block" style="padding-top: 50px">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="product-3" role="tabpanel" aria-labelledby="product-3-tab">
                                                    <div>
                                                        <img src="assets\images\product\img-7.png" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="product-4" role="tabpanel" aria-labelledby="product-4-tab">
                                                    <div>
                                                        <img src="assets\images\product\img-8.png" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mt-4 mt-xl-3">
                                    <a href="#" class="text-primary">{{$product->category->name}}</a>
                                    <h4 class="mt-1 mb-3">{{$product->name}}</h4>

                                    <p class="text-muted float-left mr-3">
                                        <span class="bx bx-star text-warning"></span>
                                        <span class="bx bx-star text-warning"></span>
                                        <span class="bx bx-star text-warning"></span>
                                        <span class="bx bx-star text-warning"></span>
                                        <span class="bx bx-star"></span>
                                    </p>

                                    <h6 class="text-success text-uppercase">20 % Off</h6>
                                    <h5 class="mb-4">Price : <span class="text-muted mr-2"><del>{{ number_format($product->price+20000) }} VNĐ</del></span> <b>{{ number_format($product->price) }} VNĐ</b></h5>
                                    <p class="text-muted mb-4">{{$product->desc}}</p>

                                    <div class="product-color">
                                        <h5 class="font-size-15">Color :</h5>
                                        <a href="#" class="active">
                                            <div class="product-color-item border rounded">
                                                <img src="{!! asset('images/'.$product->image)!!}" alt="" class="avatar-md">
                                            </div>
                                            <p>Black</p>
                                        </a>
                                        <a href="#">
                                            <div class="product-color-item border rounded">
                                                <img src="{!! asset('images/'.$product->image)!!}" alt="" class="avatar-md">
                                            </div>
                                            <p>Blue</p>
                                        </a>
                                        <a href="#">
                                            <div class="product-color-item border rounded">
                                                <img src="{!! asset('images/'.$product->image)!!}" alt="" class="avatar-md">
                                            </div>
                                            <p>Gray</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="mt-5">
                            <h5 class="mb-3">Thông Tin :</h5>

                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                    <tr>
                                        <th scope="row" style="width: 400px;">Loại :</th>
                                        <td>{{$product->category->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nhãn Hiệu</th>
                                        <td>{{$product->brand->name}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection
