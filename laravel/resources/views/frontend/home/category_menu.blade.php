<div class="sidebar_widget catrgorie mb-35">
    <h3>Loại Sản Phẩm</h3>
    @foreach($categories ?? '' as $category)
        <li>
            <a class="has-sub" href="{{ url('searchbycategory/'.$category->id) }}"> <h5>- {{$category->name}}</h5></a>
        </li>
    @endforeach
</div>
