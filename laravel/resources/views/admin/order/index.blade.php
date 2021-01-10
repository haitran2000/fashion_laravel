@extends('admin.layout')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Đơn Hàng</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                    <li class="breadcrumb-item active">Đơn Hàng</li>
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
                                            <th>Mã Hoá Đơn</th>
                                            <th>Tên Khách Hàng</th>
                                            <th>Ngày Đặt</th>
                                            <th>Tổng</th>
                                            <th>Phương Thức Thanh Toán</th>
                                            <th>Xem Chi Tiết</th>
                                            <th>Xác Nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders ?? '' as $order)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">#{{$order->id}}</a> </td>
                                            <td>{{$order->user->name}}</td>
                                            <td>
                                                {{$order->created_at}}
                                            </td>
                                            <td>
                                                {{ number_format($order->total)}} VNĐ
                                            </td>
                                            <td>
                                                <i class="fab fa-cc-mastercard mr-1"></i> {{$order->payment->name}}
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#yourModal{{$order->id}}">
                                                   Chi Tiết
                                                </button>
                                            </td>
                                            <td>
                                                @if($order->status == 1)
                                                    <form action="{{ route('activeOrder', $order->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit"  class="btn btn-warning" name="changeStatus" value="0"><i class="fa fa-check"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('activeOrder', $order->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-warning" name="changeStatus" value="1"><i class="fa fa-ban"></i></button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Modal -->
        @foreach ($orders as $order)
        <div class="modal fade" id="yourModal{{$order->id}}" tabindex="-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderdetail">Chi Tiết Hoá Đơn</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-2">Mã Hoá Đơn <span class="text-primary">#VN {{$order->id}}</span></p>
                        <p class="mb-4">Tên Khách Hàng: <span class="text-primary">{{$order->user->name}}</span></p>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">Sản Phẩm</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $total=0;
                                    ?>
                                @foreach($order_details as $order_detail)
                                    @if($order_detail->order_id==$order->id)
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{!! asset('images/'.$order_detail->product->image)!!}" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">{{$order_detail->product->name}}</h5>
                                            <p class="text-muted mb-0">$ {{$order_detail->product->price}} x {{$order_detail->quantity}}</p>
                                        </div>
                                    </td>
                                    <td>$ {{$order_detail->product->price*$order_detail->quantity}}</td>
                                      <?php $total+=$order_detail->product->price*$order_detail->quantity;?>
                                </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Tổng Tiền Sản Phẩm:</h6>
                                    </td>
                                    <td>
                                        {{$total}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Phí Ship:</h6>
                                    </td>
                                    <td>
                                        Miễn Phí
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Tổng:</h6>
                                    </td>
                                    <td>
                                        {{ number_format($order->total)}} VNĐ
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
