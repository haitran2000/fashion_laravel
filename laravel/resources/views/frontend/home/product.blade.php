<div class="new_product_area">
    <div class="block_title">
        <h3>Sản Phẩm</h3>
    </div>
    <div class="row">
        <div class="product_active owl-carousel">
            @foreach($products ?? '' as $product)
                @if($product->status==1)
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a href="{{route('singleproduct.index', $product->id)}}"><img src="{!! asset('images/'.$product->image)!!}" alt="" style="width: 254px;
height:300px"></a>
                                <div class="img_icone">
                                    <img src="{!! asset('frontend/assets/img/cart/span-new.png')!!}" alt="">
                                </div>
                                <div class="product_action">
                                    <a href="{{ url('add-to-cart/'.$product->id) }}"> <i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">{{number_format($product->price)}} VNĐ</span>
                                <h3 class="product_title" style="font-size: 14px;font-weight: 700"><a href="{{route('singleproduct.index', $product->id)}}" >{{$product->name}}</a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="#" title=" Add to Wishlist ">Thêm Yêu Thích</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal_box{{$product->id}}" title="Quick view">Xem Chi Tiết</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
        </div>
    </div>
</div>
