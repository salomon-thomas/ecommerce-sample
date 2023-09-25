@extends('layouts.app')
@section('content')
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('product.list') }}">Products</a></li>
                    <li><a href="{{ route('product.details', ['product' => $product->id]) }}">Details</a></li>
                </ul>
            </div>
            <h1>{{ $product->name }}</h1>
        </div>
        <!-- /page_header -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="owl-carousel owl-theme prod_pics magnific-gallery">
                    <div class="item">
                        <a href="{{ asset('img') }}/products/shoes/product_detail_1.jpg" title="Photo title"
                            data-effect="mfp-zoom-in"><img src="{{ asset('img') }}/products/shoes/product_detail_1.jpg"
                                alt=""></a>
                    </div>
                    <!-- /item -->
                    <div class="item">
                        <a href="{{ asset('img') }}/products/shoes/product_detail_2.jpg" title="Photo title"
                            data-effect="mfp-zoom-in"><img
                                src="{{ asset('img') }}/products/product_placeholder_detail_2.jpg"
                                data-src="{{ asset('img') }}/products/shoes/product_detail_2.jpg" alt=""
                                class="owl-lazy"></a>
                    </div>
                    <!-- /item -->
                </div>
                <!-- /carousel -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="bg_white">
        <div class="container margin_60_35">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="prod_info version_2">
                        <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4
                                reviews</em></span>
                        <p><small>SKU: MTKRY-001</small><br>{{ $product->description }}</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="prod_options version_2">
                        <div class="row">
                            <label class="col-xl-7 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a
                                    href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i
                                        class="ti-help-alt"></i></a></label>
                            <div class="col-xl-5 col-lg-5 col-md-6 col-6">
                                <div class="custom-select-form">
                                    <select class="wide" id="variant">
                                        @foreach ($product->variants as $variant)
                                            @if ($variant->stock >= 1)
                                                <option data-id="{{ $variant->price }}" class="text-center"
                                                    value="{{ $variant->id }}">
                                                    {{ $variant->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-7 col-md-6">
                                <div class="price_main"><span id="details-price"
                                        class="new_price">${{ $product->variantFirstWithStock()->price }}.00</span></div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="btn_add_to_cart"><a id="add_to_cart" data-id="{{ $product->id }}"
                                        href="#" class="btn_1">Add to
                                        Cart</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /bg_white -->

    <div class="tabs_product bg_white version_2">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab"
                        role="tab">Description</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->

    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false"
                                aria-controls="collapse-A">
                                Description
                            </a>
                        </h5>
                    </div>

                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <h3>Details</h3>
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="col-lg-5">
                                    <h3>Specifications</h3>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Color</strong></td>
                                                    <td>Blue, Purple</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Size</strong></td>
                                                    <td>150x100x100</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Weight</strong></td>
                                                    <td>0.6kg</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Manifacturer</strong></td>
                                                    <td>Manifacturer</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false"
                                aria-controls="collapse-B">
                                Reviews
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-5">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i><em>5.0/5.0</em></span>
                                            <em>Published 54 minutes ago</em>
                                        </div>
                                        <h4>"Commpletely satisfied"</h4>
                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et
                                            nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has
                                            ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i><i class="icon-star empty"></i><i
                                                    class="icon-star empty"></i><em>4.0/5.0</em></span>
                                            <em>Published 1 day ago</em>
                                        </div>
                                        <h4>"Always the best"</h4>
                                        <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas
                                            has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row justify-content-between">
                                <div class="col-lg-5">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star empty"></i><em>4.5/5.0</em></span>
                                            <em>Published 3 days ago</em>
                                        </div>
                                        <h4>"Outstanding"</h4>
                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et
                                            nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has
                                            ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i><i class="icon-star"></i><i
                                                    class="icon-star"></i><em>5.0/5.0</em></span>
                                            <em>Published 4 days ago</em>
                                        </div>
                                        <h4>"Excellent"</h4>
                                        <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius
                                            essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <p class="text-end"><a href="leave-review.html" class="btn_1">Leave a review</a></p>
                        </div>
                        <!-- /card-body -->
                    </div>

                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="bg_white">
        <div class="container margin_60_35">
            <div class="main_title">
                <h2>Related</h2>
                <span>Products</span>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div class="owl-carousel owl-theme products_carousel">
                @foreach ($related as $data)
                    <div class="item">
                        @include('product.item-tile', ['data' => $data])
                        <!-- /grid_item -->
                    </div>
                @endforeach
                <!-- /item -->

            </div>
            <!-- /products_carousel -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_white -->
@endsection
@section('optional_css')
    <link href="{{ asset('css') }}/product_page.css" rel="stylesheet">
@endsection
@section('optional_script')
    <script src="{{ asset('js') }}/custom/productDetails.js"></script>
@endsection
