<div class="container margin_60_35">
    <div class="main_title">
        <h2>Top Selling</h2>
        <span>Products</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="row small-gutters">
        @foreach (topSelling() as $top_selling)
            <div class="col-6 col-md-4 col-xl-3">
                @include('product.item-tile', ['data' => $top_selling])
                <!-- /grid_item -->
            </div>
        @endforeach
        <!-- /col -->
    </div>
    <!-- /row -->
</div>