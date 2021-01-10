@extends('frontend.layout.layout')
@section('content')
    @if (count($errors) >0)
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-danger"> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-success">
            <h1>{{ Session::get('message') }}</h1>
        </div>
    @endif
    <div class="customer_login">
    <div class="row">
        <!--login area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form">
                <h2>Đăng Nhập</h2>
                <form action="{{ route('getLoginCus') }}" method="post">
                    {{ csrf_field() }}
                    <p>
                        <label>Email <span>*</span></label>
                        <input type="email" name="txtEmail">
                    </p>
                    <p>
                        <label>Mật Khẩu <span>*</span></label>
                        <input type="password" name="txtPassword">
                    </p>
                    <div class="login_submit">
                        <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                        <label for="remember">
                            <input id="remember" type="checkbox">
                            Nhớ Mật Khẩu
                        </label>
                        <a href="#">Quên Mật Khẩu</a>
                    </div>

                </form>
            </div>
        </div>
        <!--login area start-->

        <!--register area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form register">
                <h2>Đăng Ký</h2>
                <form action="{{ route('account.create') }}" method="POST">
                @csrf
                    <p>
                        <label for="name">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </p>
                    <p>
                        <label for="name" style="padding-top: 20px;">Mật Khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </p>
                    <div class="login_submit">
                        <button type="submit" class="btn btn-success">Đăng Ký</button>
                    </div>
                </form>
            </div>
        </div>
        <!--register area end-->
    </div>
</div>
@endsection
