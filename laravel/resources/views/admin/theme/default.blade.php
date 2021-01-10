
@if(isset(Auth::user()->level))
    @if(Auth::user()->level==0)
     <span>Bạn Không Có Quyền Truy Cập Vào Nơi Này !!!!!!!!!
     DKM</span>
    @else
    <!DOCTYPE html>
<html>
<head>
    @include('admin.theme.head')
</head>
<body data-sidebar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">
      @include('admin.theme.header')
        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.theme.menu')
        @include('admin.theme.content')
    </div>
    <!-- JAVASCRIPT -->
    <script src="{!! asset('admin/assets/libs/jquery/jquery.min.js')!!}"></script>
    <script src="{!! asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')!!}"></script>
    <script src="{!! asset('admin/assets/libs/metismenu/metisMenu.min.js')!!}"></script>
    <script src="{!! asset('admin/assets/libs/simplebar/simplebar.min.js')!!}"></script>
    <script src="{!! asset('admin/assets/libs/node-waves/waves.min.js')!!}"></script>
    <!-- apexcharts -->
    <script src="{!! asset('admin/assets/libs/apexcharts/apexcharts.min.js')!!}"></script>

    <script src="{!! asset('admin/assets/js/pages/dashboard.init.js')!!}"></script>

    <!-- App js -->
    <script src="{!! asset('admin/assets/js/app.js')!!}"></script>
</body>
</html>
@endif
@endif
