@extends('frontend.layout.layout')
@section('content')
<div class=" pos_home_section">

    <div class="row pos_home">
        <div class="col-lg-3 col-md-8 col-12">
            <!--sidebar banner-->
            @include('frontend.home.banner_left')
            <!--sidebar banner end-->

            <!--categorie menu start-->
            @include('frontend.home.category_menu')
            <!--categorie menu end-->

            <!--wishlist block start-->
            <!--wishlist block end-->
            <!--sidebar banner-->
            <div class="sidebar_widget bottom ">
                <div class="banner_img">
                    <a href="#"><img src="{!! asset('frontend/assets/img/banner/banner9.jpg')!!}" alt=""></a>
                </div>
            </div>
            <br>
            <div class="sidebar_widget bottom " style="padding-top: 50px">
                <div class="banner_img">
                    <a href="#"><img src="{!! asset('frontend/assets/img/banner/banner7.jpg')!!}" alt=""></a>
                </div>
            </div>

            <!--sidebar banner end-->



        </div>
        <div class="col-lg-9 col-md-12">
            <!--banner slider start-->
            @include('frontend.home.banner_right')
            <!--banner slider start-->

            <!--new product area start-->
            @include('frontend.home.product')
            <!--new product area start-->

{{--            <!--featured product start-->--}}
{{--            @include('frontend.home.featured_product')--}}
{{--            <!--featured product end-->--}}

            <!--banner area start-->
            @include('frontend.home.banner_right2')
            <!--banner area end-->

            <!--brand logo strat-->
            @include('frontend.home.brand')
            <!--brand logo end-->
            @include('frontend.home.breadcrumbs')
        </div>
    </div>
</div>
@endsection
@section('scripts')


    <script type="text/javascript">
        function updatecart(event){
            event.preventDefault();
            let urlUpdateCart=$('.update_cart_url').data('url');
            let id =$(this).data('id');
            let quantity =$(this).parents('tr').find('input').val();
            $.ajax({
                type:"GET",
                url:urlUpdateCart,
                data:{id: id,quantity:quantity},
                success: function (data){
                    if(data.code===200){
                        $('.shopping_cart_area').html(data.cart_components);
                    }
                },
                error: function (){

                }
            })
        }
        function removeItem(event) {
            event.preventDefault();
            let urlRemoveItem=$('.table_desc').data('url');
            let id =$(this).data('id');
            $.ajax({
                type:"GET",
                url:urlRemoveItem,
                data:{id: id},
                success: function (data){
                    if(data.code===200){
                        $('.shopping_cart_area').html(data.cart_components);
                    }
                },
                error: function (){

                }
            })
        }
        $(function (){
            $(document).on('click','.update-cart',updatecart)
            $(document).on('click','.remove-from-cart',removeItem)
        })

    </script>

@endsection

