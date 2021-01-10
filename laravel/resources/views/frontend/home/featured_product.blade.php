<div class="new_product_area">
    <div class="block_title">
        <h3>New Products</h3>
    </div>
    <div class="row">
        <div class="product_active owl-carousel">
            @foreach($products ?? '' as $product)   
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="{!! asset('images/'.$product->image)!!}" alt=""></a>
                        <div class="img_icone">
                            <img src="{!! asset('frontend/assets/img/cart/span-new.png')!!}" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">{{$product->price}}</span>
                        <h3 class="product_title"><a href="single-product.html">{{$product->desc}}</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>