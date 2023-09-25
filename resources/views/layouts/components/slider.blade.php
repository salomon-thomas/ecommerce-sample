<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        @foreach (sliderProducts() as $item)
            <div class="owl-slide cover" style="background-image: url(img/slides/slide_home_2.jpg);">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-end">
                            <div class="col-lg-6 static">
                                <div class="slide-text text-end white">
                                    <h2 class="owl-slide-animated owl-slide-title">
                                        {{ $item->name }}<br>{{ $item->variantFirstWithStock()->name }}</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        Limited items available at this price
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                            href="{{ route('product.details', ['product' => $item->id]) }}"
                                            role="button">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
        @endforeach

    </div>
    <div id="icon_drag_mobile"></div>
</div>
<!--/carousel-->