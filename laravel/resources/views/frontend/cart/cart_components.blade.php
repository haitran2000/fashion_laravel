<div class="shopping_cart_area">
    <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc" data-url="{{route('removeItem')}}">
                    <div class="cart_page table-responsive" >
                            <table class="update_cart_url"   data-url="{{route('updateCart')}}">
                        <thead>
                            <tr>
                                <th class="product_thumb">Hình Ảnh</th>
                                <th class="product_name">Tên Sản Phẩn</th>
                                <th class="product-price">Giá</th>
                                <th class="product_quantity">Số Lượng</th>
                                <th class="product_total">Tổng</th>
                                <th class="product_delete">Xoá</th>
                                <th class="product_update">Cập Nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0 ;?>
@if(session('cart'))
    @foreach(session('cart') as $id => $details)
        <?php $total += $details['price'] * $details['quantity'] ?>
        <tr>

            <td class="product_thumb"><a href="#"><img src="{{ asset('images/'.$details['image']) }}" alt=""></a></td>
            <td class="product_name"><a href="#">{{ $details['name'] }}</a></td>
            <td class="product-price">{{ $details['price'] }}</td>
            <td class="product_quantity"><input min="0" max="100" type="number" value="{{ $details['quantity'] }}"></td>
            <td class="product_total">{{ number_format($details['price'] * $details['quantity']) }} VNĐ</td>
            <td><button class="btn btn-danger btn remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash"></i></button></td>
            <td><button class="btn btn-danger btn update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button></td>
        </tr>
        @endforeach
        @endif
        </tbody>
        </table>
        </div>
        <div class="cart_submit" href="{{route('clear-all')}}">
            <button type="submit">Xoá Tất Cả Khỏi Giỏ Hàng</button>
        </div>
        </div>
        </div>
        </div>
        <!--coupon code area start-->
        <div class="coupon_area">
                <div class="col-lg-12 col-md-12">
                    <div class="coupon_code">
                        <h3>Tổng Giỏ Hàng</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Tổng Giá</p>
                                <p class="cart_amount"> {{ number_format($total)}} VNĐ</p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Vận Chuyển</p>
                                <p class="cart_amount"><span>Phí Vận Chuyển:</span> 25,000 VNĐ</p>
                            </div>
                            <a href="#">Tính Toán Chi Phí Vận Chuyển</a>

                            <div class="cart_subtotal">
                                <p>Tổng</p>
                                <p class="cart_amount">{{ number_format($total+25000) }} VNĐ</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{ url('cart/checkout')}}">Tiến Hành Mua Hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--coupon code area end-->
        </form>
        </div>
