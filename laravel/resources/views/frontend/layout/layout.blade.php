<!DOCTYPE html>

<html class="no-js" lang="zxx" >
    <head>
        @include('frontend.layout.head')
    </head>
    <body style="font-family: 'Roboto', sans-serif;">
        <!-- Add your site or application content here -->
        <!--pos page start-->
        <div class="pos_page">
            <div class="container">
                <!--pos page inner-->
                <div class="pos_page_inner">
                    <!--header area -->
                    @include('frontend.layout.header')
                    <!-- ========== Left Sidebar Start ========== -->
                    @yield('content')
                </div>
            </div>
        </div>
        @include('frontend.layout.footer')

        <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: inline;"><i class="fa fa-angle-double-up"></i></a>
        <script src="{!! asset('frontend/assets/js/vendor/jquery-1.12.0.min.js')!!}"></script>
        <script src="{!! asset('frontend/assets/js/popper.js')!!}"></script>
        <script src="{!! asset('frontend/assets/js/bootstrap.min.js')!!}"></script>
        <script src="{!! asset('frontend/assets/js/ajax-mail.js')!!}"></script>
        <script src="{!! asset('frontend/assets/js/plugins.js')!!}"></script>
        <script src="{!! asset('frontend/assets/js/main.js')!!}"></script>
        @yield('scripts')
    </body>
</html>
