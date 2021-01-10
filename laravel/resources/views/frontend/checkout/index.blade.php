@extends('frontend.layout.layout')
@section('content')
<div class="Checkout_section">
    <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form action="{{route('update.informaton')}}" id="UPD" method="POST">
                        {{ csrf_field() }}
                        <h3>Thông Tin Nhận Hàng</h3>
                        <div class="row">

                            <div class="col-lg-12 mb-30">
                                <label>Tên  <span>*</span></label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" disabled>
                            </div>
                            <div class="col-12 mb-30">
                                <label>Địa Chỉ  <span>*</span></label>
                                <input id="myText" name="address" placeholder="House Number and Street Name" type="text" value="{{Auth::user()->address}}" disabled>
                            </div>
                            <div class="col-12 mb-30">
                                <label>Quận/Huyện <span>*</span></label>
                                <input id="myText" type="text" name="district" value="{{Auth::user()->district}}" disabled>
                            </div>
                             <div class="col-12 mb-30">
                                <label>Thành phố/Tỉnh<span>*</span></label>
                                <input id="myText" type="text" name="city" value="{{Auth::user()->city}}" disabled>
                            </div>
                            <div class="col-lg-12 mb-30">
                                <label>Điện Thoại<span>*</span></label>
                                <input id="myText" type="text" name="phone" value="{{Auth::user()->phone}}" disabled>

                            </div>
                            <div class="col-12">
                                <button id="save" type="submit" class="my-1 btn btn-success btn-block" style="display: none "> Lưu</button>
                            </div>
                        </div>
                    </form>
                    <button id="update" onclick="enable_disable()" class="my-1 btn btn-success btn-block">
                        Địa Chỉ Mới
                    </button>
                </div>

                <div class="col-lg-6 col-md-6">
                    <form action="{{ route('confirm') }}" method="POST">
                        {{ csrf_field() }}
                        <h3>Giỏ Hàng</h3>
                        <div class="order_table table-responsive mb-30">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản Phẩm</th>
                                        <th>Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0 ;?>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                    <tr>
                                        <td> {{ $details['name'] }} <strong> × {{ $details['quantity'] }}</strong></td>
                                        <td> {{ number_format($details['price'] * $details['quantity']) }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tổng Tiền Sản Phẩm</th>
                                        <td> <strong>{{ number_format($total)}}"</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Chi Phí Vận Chuyển</th>
                                        <td><strong>{{ number_format(25000)}}</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Tổng Tất Cả</th>
                                        <td><strong>{{ number_format($total+25000)}}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="col-12">
                            <div class="order-notes">
                                <label for="order_note">Ghi Chú</label>
                                <textarea id="order_note" placeholder="Giao ngày nào ?????"></textarea>
                            </div>
                        </div>
                        <div class="payment_method">
                           <div class="panel-default">
                                <div id="method" class="collapse one" data-parent="#accordion">
                                    <div class="card-body1">
                                       <p>Kiểm Tra Tên , Địa Chỉ , Số Điện Thoại Để Đơn Hàng Được Vẫn Chuyển Thuận Lợi.</p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                           <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio" data-target="createp_account">

                                <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Trả Tiền Khi Nhận Hàng</label>
                            </div>
                            <div class="order_button">
                                <button type="submit" class="my-1 btn btn-success btn-block">Xác Nhận Đặt Hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

@endsection
<script type="text/javascript">
        function enable_disable() {
            $("#UPD :input").prop("disabled", false);
            document.getElementById("update").style.visibility = "hidden";
            document.getElementById("save").style.display = "block";
        }
</script>
