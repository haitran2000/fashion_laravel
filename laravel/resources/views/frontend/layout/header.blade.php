<div class="header_area">
    <!--header top-->
     <div class="header_top">
        <div class="row align-items-center">
             <div class="col-lg-6 col-md-6">
                <div class="switcher">
                     <ul>
                         <li class="currency"><a href="#"> Currency : $ <i class="fa fa-angle-down"></i></a>
                             <ul class="dropdown_currency">
                                 <li><a href="#"> VND (VietNam)  </a></li>
                             </ul>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6">
                 <div class="header_links">
                     <ul>
                         <li><a href="{{ url('account')}}" title="My account">Tài Khoản Của Tôi</a></li>
                         <li><a href="cart.html" title="My cart">Giỏ Hàng</a></li>
                         @if( !isset(Auth::user()->name))
                             <li><a href="{{ url('login')}}" title="Login">Đăng Nhập</a></li>
                         @else
                             <li><a>Xin Chào : {{Auth::user()->name}}</a></li>
                             <li><a href="{{ url('logout')}}">Đăng Xuất</a></li>
                         @endif
                     </ul>
                 </div>
             </div>
        </div>
     </div>
     <!--header top end-->

     <!--header middel-->
     <div class="header_middel">
         <div class="row align-items-center">
            <!--logo start-->
             <div class="col-lg-3 col-md-3">
                 <div class="logo">
                     <a href="{{ url('')}}"><img src="{!! asset('frontend/assets/img/logo/a.png')!!}" alt=""></a>
                 </div>
             </div>
             <!--logo end-->
             <div class="col-lg-9 col-md-9">
                 <div class="header_right_info">
                     <div class="search_bar">
                         <form method="get" action="{{ route('search') }}">
                             <input placeholder="Search..." type="text" name="key">
                             <button type="submit"><i class="fa fa-search"></i></button>
                         </form>
                     </div>
                     <div class="shopping_cart">
                         <a href="#"><i class="fa fa-shopping-cart')!!}"></i> {{ count((array) session('cart')) }} Sản Phẩm <i class="fa fa-angle-down"></i></a>

                         <!--mini cart-->
                         <div class="mini_cart">
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                             <div class="cart_item">
                                <div class="cart_img">
                                    <a href="#"><img src="{{ asset('images/'.$details['image']) }}" alt=""></a>
                                </div>
                                 <div class="cart_info">
                                     <a href="#">{{ $details['name'] }}</a>
                                     <span class="cart_price">${{ $details['price'] }}</span>
                                     <span class="quantity">Số lượng :{{ $details['quantity'] }}</span>
                                 </div>
                                 <div class="cart_remove">
                                     <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                                 </div>
                             </div>
                                @endforeach
                            @endif
                            <!-- Cart-->
                             <div class="total_price">
                                <?php $total = 0 ?>
                                @foreach((array) session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity'] ?>
                            @endforeach
                                 <span> Tổng </span>
                                 <span class="prices">  {{number_format($total)  }} VNĐ </span>
                             </div>
                             <div class="cart_button">
                                 <a href="{{ url('cart') }}"> Thanh toán</a>
                             </div>
                         </div>
                         <!--mini cart end-->
                     </div>

                 </div>
             </div>
         </div>
     </div>
     <!--header middel end-->
 <div class="header_bottom">
     <div class="row">
             <div class="col-12">
                 <div class="main_menu_inner">
                     <div class="main_menu d-none d-lg-block">
                         <nav>
                             <ul>
                                 <li class="active"><a href="{{ url('')}}" >Trang Chủ</a>
                                 </li>
                                 <li><a href={{ url('shoplist')}}>Danh Sách Sản Phẩm</a>
                                 <li><a href="contact.html">Liên Hệ</a></li>

                             </ul>
                         </nav>
                     </div>
                     <div class="mobile-menu d-lg-none mean-container"><div class="mean-bar"><a href="#nav" class="meanmenu-reveal" style="background:;color:;"><span></span><span></span><span></span></a><nav class="mean-nav">
                             <ul style="display: none;">
                                 <li><a href="index.html">Trang Chủ</a>
                                 </li>
                                     <div>
                                         <div>
                                             <ul style="display: none;">
                                                 <li><a href="shop-list.html">shop list</a></li>
                                                 <li><a href="shop-fullwidth.html">shop Full Width Grid</a></li>
                                                 <li><a href="shop-fullwidth-list.html">shop Full Width list</a></li>
                                                 <li><a href="shop-sidebar.html">shop Right Sidebar</a></li>
                                                 <li><a href="shop-sidebar-list.html">shop list Right Sidebar</a></li>
                                                 <li><a href="single-product.html">Product Details</a></li>
                                                 <li><a href="single-product-sidebar.html">Product sidebar</a></li>
                                                 <li><a href="single-product-video.html">Product Details video</a></li>
                                                 <li><a href="single-product-gallery.html">Product Details Gallery</a></li>
                                             </ul>
                                         <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                     </div>
                                 </li>
                                 <li><a href="#">women</a>
                                     <div>
                                         <div>
                                             <div>
                                                 <h3><a href="#">Accessories</a></h3>
                                                 <ul style="display: none;">
                                                     <li><a href="#">Cocktai</a></li>
                                                     <li><a href="#">day</a></li>
                                                     <li><a href="#">Evening</a></li>
                                                     <li><a href="#">Sundresses</a></li>
                                                     <li><a href="#">Belts</a></li>
                                                     <li><a href="#">Sweets</a></li>
                                                 </ul>
                                             <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                             <div>
                                                 <h3><a href="#">HandBags</a></h3>
                                                 <ul style="display: none;">
                                                     <li><a href="#">Accessories</a></li>
                                                     <li><a href="#">Hats and Gloves</a></li>
                                                     <li><a href="#">Lifestyle</a></li>
                                                     <li><a href="#">Bras</a></li>
                                                     <li><a href="#">Scarves</a></li>
                                                     <li><a href="#">Small Leathers</a></li>
                                                 </ul>
                                             <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                             <div>
                                                 <h3><a href="#">Tops</a></h3>
                                                 <ul style="display: none;">
                                                     <li><a href="#">Evening</a></li>
                                                     <li><a href="#">Long Sleeved</a></li>
                                                     <li><a href="#">Shrot Sleeved</a></li>
                                                     <li><a href="#">Tanks and Camis</a></li>
                                                     <li><a href="#">Sleeveless</a></li>
                                                     <li><a href="#">Sleeveless</a></li>
                                                 </ul>
                                             <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                         </div>
                                         <div>
                                             <div>
                                                 <a href="#"><img src="{!! asset('frontend/assets/img/banner/banner1.jpg')!!}" alt=""></a>
                                             </div>
                                             <div>
                                                 <a href="#"><img src="{!! asset('frontend/assets/img/banner/banner2.jpg')!!}" alt=""></a>
                                             </div>
                                         </div>
                                     </div>
                                 </li>
                                 <li><a href="#">men</a>
                                     <div>
                                         <div>
                                             <div>
                                                 <h3><a href="#">Rings</a></h3>
                                                 <ul style="display: none;">
                                                     <li><a href="#">Platinum Rings</a></li>
                                                     <li><a href="#">Gold Ring</a></li>
                                                     <li><a href="#">Silver Ring</a></li>
                                                     <li><a href="#">Tungsten Ring</a></li>
                                                     <li><a href="#">Sweets</a></li>
                                                 </ul>
                                             <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                             <div>
                                                 <h3><a href="#">Bands</a></h3>
                                                 <ul style="display: none;">
                                                     <li><a href="#">Platinum Bands</a></li>
                                                     <li><a href="#">Gold Bands</a></li>
                                                     <li><a href="#">Silver Bands</a></li>
                                                     <li><a href="#">Silver Bands</a></li>
                                                     <li><a href="#">Sweets</a></li>
                                                 </ul>
                                             <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                             <div>
                                                 <a href="#"><img src="{!! asset('frontend/assets/img/banner/banner3.jpg')!!}" alt=""></a>
                                             </div>
                                         </div>

                                     </div>
                                 </li>
                                 <li><a href="#">pages</a>
                                     <div>
                                         <div>
                                             <div>
                                                 <h3><a href="#">Column1</a></h3>
                                                 <ul style="display: none;">
                                                     <li><a href="portfolio.html">Portfolio</a></li>
                                                     <li><a href="portfolio-details.html">single portfolio </a></li>
                                                     <li><a href="about.html">About Us </a></li>
                                                     <li><a href="about-2.html">About Us 2</a></li>
                                                     <li><a href="services.html">Service </a></li>
                                                     <li><a href="my-account.html">my account </a></li>
                                                 </ul>
                                             <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                             <div>
                                                 <h3><a href="#">Column2</a></h3>
                                                 <ul style="display: none;">
                                                     <li><a href="blog.html">Blog </a></li>
                                                     <li><a href="blog-details.html">Blog  Details </a></li>
                                                     <li><a href="blog-fullwidth.html">Blog FullWidth</a></li>
                                                     <li><a href="blog-sidebar.html">Blog  Sidebar</a></li>
                                                     <li><a href="faq.html">Frequently Questions</a></li>
                                                     <li><a href="404.html">404</a></li>
                                                 </ul>
                                             <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                             <div>
                                                 <h3><a href="#">Column3</a></h3>
                                                 <ul style="display: none;">
                                                     <li><a href="contact.html">Contact</a></li>
                                                     <li><a href="cart.html">cart</a></li>
                                                     <li><a href="checkout.html">Checkout  </a></li>
                                                     <li><a href="wishlist.html">Wishlist</a></li>
                                                     <li><a href="login.html">Login</a></li>
                                                 </ul>
                                             <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                         </div>
                                     </div>
                                 </li>

                                 <li><a href="blog.html">blog</a>
                                     <div>
                                         <div>
                                             <ul style="display: none;">
                                                 <li><a href="blog-details.html">blog details</a></li>
                                                 <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                 <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                             </ul>
                                         <a class="mean-expand" href="#" style="font-size: 18px">+</a></div>
                                     </div>
                                 </li>
                                 <li class="mean-last"><a href="contact.html">contact us</a></li>

                             </ul>
                         </nav></div>
                         <div class="mean-push"></div><nav style="display: none;">
                             <ul>
                                 <li><a href="contact.html">contact us</a></li>
                             </ul>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
 </div>
</div>
