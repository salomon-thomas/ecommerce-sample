<div class="container margin_60_35">
    <div class="main_title">
        <h2>Featured</h2>
        <span>Products</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
        @foreach (featured() as $featured)
            <div class="item">
                @include('product.item-tile', ['data' => $featured])
            </div>
            <!-- /item -->
        @endforeach
    </div>
    <!-- /products_carousel -->
</div>