<div class="brand_logo mb-60">
    <div class="block_title">
        <h3>Brands</h3>
    </div>
    <div class="row">
        <div class="brand_active owl-carousel">
            @foreach($brands ?? '' as $brand)  
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="{!! asset('images/'.$brand->image)!!}" alt=""></a>
                </div>
            </div>
            @endforeach
        </div>
       
    </div>
</div>