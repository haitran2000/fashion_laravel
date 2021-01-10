@extends('frontend.layout.layout')
@section('content')
    @include('frontend.cart.cart_components')
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
