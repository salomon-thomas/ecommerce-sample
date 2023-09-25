<div class="grid_item">
    <span class="ribbon new">New</span>
    <figure>
        <a href="{{ route('product.details', ['product' => $data->id]) }}">
            <img class="{{ asset('img') }}-fluid lazy"
                src="{{ asset('img') }}/products/product_placeholder_square_medium.jpg"
                data-src="{{ asset('img') }}/products/shoes/5.jpg" alt="">
        </a>
    </figure>
    <a href="{{ route('product.details', ['product' => $data->id]) }}">
        <h3>{{ $data->name }}</h3>
    </a>
    <div class="price_box">
        <span class="new_price">${{ $data->variantFirstWithStock()->price }}.00</span>
    </div>
    <ul>
        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>
        </li>
        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to
                    compare</span></a></li>
        @if ($data->variantFirstWithStock() != null)
            <li><a href="{{ route('cart.add', ['product_id' => $data->id, 'variant_id' => $data->variantFirstWithStock()->id]) }}"
                    class="tooltip-1 add_to_cart" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i
                        class="ti-shopping-cart"></i><span>Add to cart</span></a>
            </li>
        @endif
    </ul>
</div>
