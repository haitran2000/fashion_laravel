<div class="vertical-menu">

    <div data-simplebar="" class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Bảng Điều Khiển</span>
                    </a>
                </li>
                <li class="menu-title">Quản Lí</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Quản Lý</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('panel/product')}}">Sản Phẩm</a></li>
                        <li><a href="{{ url('panel/category')}}">Loại Sản Phẩm </a></li>
                        <li><a href="{{ url('panel/brand')}}">Nhãn Hiệu</a></li>
                        <li><a href="{{ url('panel/customer')}}">Khách Hàng</a></li>
                        <li><a href="{{ url('panel/payment')}}">Phương Thức Thanh Toán</a></li>
                        <li><a href="{{ url('panel/banner')}}">Slider</a></li>
                        <li><a href="{{ url('panel/product/create')}}">Thêm Sản Phẩm Mới</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Đơn Hàng</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('panel/order_today')}}">Đơn hàng hôm nay</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('panel/order')}}">Tất cả đơn hàng</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
