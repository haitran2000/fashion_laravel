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
        @if(Session::has('message'))
                <div class="alert alert-success">
                  {{ Session::get('message') }}
                </div>
        @endif
        @yield('content')

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
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
    </script>
    @include('ckfinder::setup')
</body>
</html>
    @endif
@endif
