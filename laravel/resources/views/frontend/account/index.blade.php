@extends('frontend.layout.layout')
@section('content')
<section class="main_content_area">
    <div class="account_dashboard">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Tài Khoản</a></li>
                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Đơn Hàng Đã Mua</a></li>
                        <li><a href="#changepass" data-toggle="tab" class="nav-link">Đổi Mật Khẩu</a></li>
                        <li><a href="#account-details" data-toggle="tab" class="nav-link">Thay Đổi Địa Chỉ Địa Chỉ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade show active" id="dashboard">
                        <h3>Tài Khoản </h3>
                    </div>
                    <div class="tab-pane fade" id="orders">
                        <h3>Đơn Hàng</h3>
                        @if($orders!=null)
                        <div class="coron_table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Ngày</th>
                                    <th>Trạng Thái</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders ?? '' as $order)
                                    @if($order->user_id==Auth::user()->id)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->created_at}}</td>
                                    @if($order->status==0)
                                    <td> Chưa Xác Nhạn</td>
                                    @else
                                        <td>Đã Xác Nhận</td>
                                    @endif
                                    <td>{{number_format($order->total)}} VNĐ </td>

                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <h5>Bạn Chưa Có Đơn Hàng Nào !!!</h5>
                        @endif

                    </div>
                    <div class="tab-pane fade" id="changepass">
                            <div class="panel-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{route('changepass')}}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <label for="new-password" class="col-md-4 control-label">Nhập Mật Khẩu Cũ</label>

                                        <div class="col-md-6">
                                            <input id="current-password" type="password" class="form-control" name="old_password" required>

                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                        <label for="new-password" class="col-md-4 control-label">Mật Khẩu Mới</label>

                                        <div class="col-md-6">
                                            <input id="new-password" type="password" class="form-control" name="new_password" required>

                                            @if ($errors->has('new-password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="new-password-confirm" class="col-md-4 control-label">Nhập Lại Mật Khẩu Mới</label>

                                        <div class="col-md-6">
                                            <input id="new-password-confirm" type="password" class="form-control" name="confirm_password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Đổi Mật Khẩu
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="account-details">
                        <h3>Account details </h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{route('update.informaton')}}" id="UPD" method="POST">
                                        {{ csrf_field() }}
                                        <h3>Thông Tin Nhận Hàng</h3>
                                        <div class="row">

                                            <div class="col-lg-12 mb-30">
                                                <label>Tên  <span>*</span></label>
                                                <input type="text" name="name" value="{{Auth::user()->name}}">
                                            </div>
                                            <div class="col-12 mb-30">
                                                <label>Địa Chỉ  <span>*</span></label>
                                                <input id="myText" name="address" placeholder="House Number and Street Name" type="text" value="{{Auth::user()->address}}" >
                                            </div>
                                            <div class="col-12 mb-30">
                                                <label>Quận/Huyện <span>*</span></label>
                                                <input id="myText" type="text" name="district" value="{{Auth::user()->district}}" >
                                            </div>
                                            <div class="col-12 mb-30">
                                                <label>Thành phố/Tỉnh<span>*</span></label>
                                                <input id="myText" type="text" name="city" value="{{Auth::user()->city}}" >
                                            </div>
                                            <div class="col-lg-12 mb-30">
                                                <label>Điện Thoại<span>*</span></label>
                                                <input id="myText" type="text" name="phone" value="{{Auth::user()->phone}}" >

                                            </div>
                                            <div class="col-12">
                                                <button id="save" type="submit" class="my-1 btn btn-success btn-block"> Lưu</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>
$('#submit_change_pass').on('click', function() {
    // Gán các giá trị trong form tạo note vào các biến
    $old_pass = $('#old_pass').val();
    $new_pass = $('#new_pass').val();
    $re_new_pass = $('#re_new_pass').val();

    // Nếu một trong các biến này rỗng
    if ($old_pass == '' || $old_pass == '' || $re_new_pass == '')
    {
        $('#formChangePass .alert').removeClass('hidden');
        $('#formChangePass .alert').html('Vui lòng điền đầy đủ thông tin bên trên.');
    }
    // Ngược lại
    else
    {
        // Thực thi gửi dữ liệu bằng Ajax
        $.ajax({
            url : 'change-pass.php', // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
                old_pass : $old_pass,
                new_pass : $new_pass,
                re_new_pass : $re_new_pass
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formChangePass .alert').removeClass('hidden');
                $('#formChangePass .alert').html(data);
            }
        });
    }
});
</script>
