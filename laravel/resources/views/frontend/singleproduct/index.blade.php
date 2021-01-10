@extends('frontend.layout.layout')
@section('content')
<div class="product_details">
    <div class="row">
        <div class="col-lg-5 col-md-6">
            <div class="product_tab fix">
                <div class="product_tab_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="{!! asset('images/'.$products->image)!!}" alt=""></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2" aria-selected="false"><img src="{!! asset('images/'.$products->image)!!}" alt=""></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3" aria-selected="false"><img src="{!! asset('images/'.$products->image)!!}" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content produc_tab_c">
                    <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="{!! asset('images/'.$products->image)!!}" alt=""></a>
                            <div class="img_icone">
                                <img src="{!! asset('images/'.$products->image)!!}" alt="">
                            </div>
                            <div class="view_img">
                                <a class="large_view" href="{!!asset('images/'.$products->image)!!}"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="p_tab2" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="{!! asset('images/'.$products->image)!!}" alt=""></a>
                            <div class="img_icone">
                                <img src="{!! asset('images/'.$products->image)!!}" alt="">
                            </div>
                            <div class="view_img">
                                <a class="large_view" href="{!! asset('images/'.$products->image)!!}"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="p_tab3" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="{!! asset('frontend/assets/img/product/product15.jpg')!!}" alt=""></a>
                            <div class="img_icone">
                                <img src="{!! asset('frontend/assets/img/cart/span-new.png')!!}" alt="">
                            </div>
                            <div class="view_img">
                                <a class="large_view" href="{!! asset('frontend/assets/img/product/product15.jpg')!!}"> <i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-7 col-md-6">
            <div class="product_d_right">
                <h1>{{$products->name}}</h1>
                <div class="product_ratting mb-10">
                    <ul>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#">Số Sao Sản Phẩm </a></li>
                    </ul>
                </div>
                <div class="product_desc">
                    <p>{{$products->desc}}</p>
                </div>

                <div class="content_price mb-15">
                    <span>{{number_format($products->price)}} VNĐ</span>
                </div>
                <div class="box_quantity mb-20">
                    <form action="#">
                        <label>Số Lượng</label>
                        <input min="0" max="100" value="1" type="number">
                    </form>
                    <button type="submit"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</button>
                </div>
                <div class="wishlist-share">
                    <h4>Share:</h4>
                    <li><div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                    </div></li>

            </div>
        </div>
    </div>
</div>
<div class="product_d_info">
    <div class="row">
        <div class="col-12">
            <div class="product_d_inner">
                <div class="product_info_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Thông Tin</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <div class="product_info_content">
                            <p>{!!$products->content!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
