@extends('frontend.layout.layout')
@section('content')
<div class="col-lg-6 col-md-6">
    <form action="#">
        <h3>Billing Details</h3>
        <div class="row">

            <div class="col-lg-6 mb-30">
                <label>Tên  <span>*</span></label>
                <input type="text">
            </div>
            <div class="col-12 mb-30">
                <label>Địa Chỉ  <span>*</span></label>
                <input placeholder="House Number and Street Name" type="text">
            </div>
            <div class="col-12 mb-30">
                <label>Quận/Huyện <span>*</span></label>
                <input type="text" >
            </div>
            <div class="col-12 mb-30">
                <label>Thành phố/Tỉnh<span>*</span></label>
                <input type="text" >
            </div>
            <div class="col-lg-6 mb-30">
                <label>Điện Thoại<span>*</span></label>
                <input type="text">

            </div>
            <div class="col-lg-6 mb-30">
                <label> Email   <span>*</span></label>
                <input type="text">
            </div>
        </div>
    </form>
</div>
@endsection
