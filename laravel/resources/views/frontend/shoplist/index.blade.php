@extends('frontend.layout.layout')
@section('content')
<div class=" pos_home_section">
    <div class="row pos_home">
            <div class="col-lg-12 col-md-12">
                <!--banner slider start-->
                <div class="banner_slider mb-35">
                    <img src="assets\img\banner\bannner10.jpg" alt="">
                </div>
                <!--banner slider start-->

                <!--shop toolbar start-->
                <div class="shop_toolbar list_toolbar mb-35">
                    <div class="list_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="false" class=""><i class="fa fa-th-large"></i></a>
                            </li>
                            <li>
                                <a class="active" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="true"><i class="fa fa-th-list"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="page_amount">
                        <p>Tìm Được {{$products->count()}} Kết Quả </p>
                    </div>
                </div>
                <!--shop toolbar end-->

                <!--shop tab product-->
                <div class="shop_tab_product">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="large" role="tabpanel">
                            <div class="row">
                                @foreach($products ?? '' as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="single-product.html"><img src="{!! asset('images/'.$product->image)!!}" alt=""></a>
                                            <div class="img_icone">
                                                <img src="assets\img\cart\span-new.png" alt="">
                                            </div>
                                            <div class="product_action">
                                                <a href="single-product.html"> <i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <span class="product_price">{{number_format($product->price) }} VNĐ</span>
                                            <h3 class="product_title"><a href="#">{{$product->name}}</a></h3>
                                        </div>
                                        <div class="product_info">
                                            <ul>
                                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">Xem Chi Tiết</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="list" role="tabpanel">
                            @foreach($products ?? '' as $product)
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="{{route('singleproduct.index', $product->id)}}"><img src="{!! asset('images/'.$product->image)!!}" alt=""></a>
                                                <div class="hot_img">
                                                    <img src="assets\img\cart\span-hot.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a href="single-product.html">{{$product->name}}</a></h3>
                                                </div>
                                                <p class="design"> {{$product->desc}}</p>
                                                <div class="content_price">
                                                    <span>{{number_format($product->price) }} VNĐ</span>
                                                    <span class="old-price">{{number_format($product->price+25000)}} VNĐ</span>
                                                </div>
                                                <div class="add_links">
                                                    <ul>
                                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        @if(isset($products->links ))
                            {{$products->links()}}
                        @endif
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
