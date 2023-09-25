<ul id="banners_grid" class="clearfix">
    @foreach (getTopCategories() as $collection)
        <li>
            <a href="{{ route('product.category', ['category' => $collection->id]) }}" class="img_container">
                <img src="{{ asset('img') }}/banners_cat_placeholder.jpg" data-src="{{ asset('img') }}/banner_1.jpg"
                    alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>{{ $collection->name }}'s Collection</h3>
                    <div><span class="btn_1">Shop Now</span></div>
                </div>
            </a>
        </li>
    @endforeach

</ul>