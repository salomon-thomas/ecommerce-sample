@extends('layouts.app')
@section('content')
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('cart.list') }}">Cart</a></li>
                </ul>
            </div>
            <h1>Cart page</h1>
        </div>
        <?php $total = 0; ?>
        <!-- /page_header -->
        <table class="table table-striped cart-list">
            <thead>
                <tr>
                    <th>
                        Product
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th>
                        Subtotal
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $list_item)
                    <tr data-id="{{ $list_item->id }}">
                        <td>
                            <div class="thumb_cart">
                                <img src="img/products/product_placeholder_square_small.jpg"
                                    data-src="img/products/shoes/1.jpg" class="lazy" alt="Image">
                            </div>
                            <span class="item_cart">{{ $list_item->product->name }}-{{ $list_item->variant->name }}</span>
                        </td>
                        <td>
                            <strong>${{ $list_item->variant->price }}.00</strong>
                        </td>
                        <td data-id="{{ $list_item->id }}">
                            <div class="numbers-row">
                                <input type="text" readonly value="{{ $list_item->units }}" id="quantity_1"
                                    class="qty2" name="quantity_1">
                            </div>
                        </td>
                        <td class="item-sub-total">
                            <?php $total += $list_item->variant->price * $list_item->units; ?>
                            <strong>${{ $list_item->variant->price * $list_item->units }}.00</strong>
                        </td>
                        <td class="options">
                            <a class="cart-delete" href="{{ route('cart.delete', ['cartItem' => $list_item->id]) }}">
                                <i class="ti-trash"></i> <!-- Delete Icon -->
                                <i class="spinner-icon fa fa-spinner fa-spin" style="display: none;"></i>
                                <!-- Spinning Icon -->
                            </a>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="row add_top_30 flex-sm-row-reverse cart_actions">
            <div class="col-sm-12">
                <div class="apply-coupon">
                    <div class="form-group">
                        <div class="row g-2">
                            <div class="col-md-4"><input type="text" name="coupon-code" value=""
                                    placeholder="Promo code" class="form-control"></div>
                            <div class="col-md-4"><button type="button" class="btn_1 outline">Apply Coupon</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /cart_actions -->

    </div>
    <!-- /container -->

    <div class="box_cart">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <ul>
                        <li id="sub_total">
                            <span>Subtotal</span> ${{ $total }}.00
                        </li>
                        <li>
                            <span>Shipping</span> $0.00
                        </li>
                        <li id="total">
                            <span>Total</span> ${{ $total }}.00
                        </li>
                    </ul>
                    @if (count($list) > 0)
                        <a href="{{ route('checkout.preview') }}" class="btn_1 full-width cart">Proceed to
                            Checkout</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /box_cart -->
@endsection
@section('optional_css')
    <link href="{{ asset('css') }}/cart.css" rel="stylesheet">
@endsection
@section('optional_script')
    <script src="{{ asset('js') }}/custom/cartPage.js"></script>
@endsection
