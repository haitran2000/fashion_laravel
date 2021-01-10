<div class="banner_slider slider_1">
    <div class="slider_active owl-carousel">
        @foreach($banners ?? '' as $banner)
        @if($banner->type==0)
        <div class="single_slider" style="background-image: url({{asset('images/'. $banner->image)}});width: 873px;height:348px ">
            <div class="slider_content">
                <div class="slider_content_inner">
                    <h1>{{$banner->desc}}</h1>
                    <p>{{$banner->content}} </p>
                    <a href="#">shop now</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
