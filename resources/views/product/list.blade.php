@extends('layouts.app')
@section('content')
    <div class="container margin_30">
        <div class="top_banner version_2">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <h1>Shoes - Grid listing</h1>
                    </div>
                </div>
            </div>
            <img src="{{ asset('img') }}/bg_cat_shoes.jpg" class="{{ asset('img') }}-fluid" alt="">
        </div>
        <!-- /top_banner -->
        <div id="stick_here"></div>
        <div class="toolbox elemento_stick version_2">
            <div class="container">
                <ul class="clearfix">

                </ul>

            </div>
        </div>
        <!-- /toolbox -->
        <div class="row small-gutters">
            @foreach ($products as $product)
                <div class="col-6 col-md-4 col-xl-3">
                    @include('product.item-tile', ['data' => $product])
                    <!-- /grid_item -->
                </div>
                <!-- /col -->
            @endforeach
        </div>
        <!-- /row -->

        <div class="pagination__wrapper">
            {{ $products->links() }}
        </div>

    </div>
    <!-- /container -->
@endsection
@section('optional_css')
<link href="{{ asset('css')}}/listing.css" rel="stylesheet">
@endsection
