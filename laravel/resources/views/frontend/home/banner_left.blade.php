<div class="sidebar_widget banner mb-35">
    @if($banners!=null)
    @foreach($banners ?? '' as $banner)
    @if($banner->type==1)
    <div class="banner_img mb-35">
        <a href="#"><img src="{!! asset('images/'. $banner->image)!!}" alt=""></a>
    </div>
    @endif
    @endforeach
        @endif
</div>
