@extends('layouts.app')
@section('content')
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('order.list') }}">Orders</a></li>
                    <li><a href="{{ route('order.details', ['orderId' => $order->id]) }}">Details</a></li>
                </ul>
            </div>
            <h1>Order Details</h1>
        </div>
        <!-- Order Details Table -->
        <table class="table table-striped order-details-list">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $order_item)
                    <tr>
                        <td>
                            <div class="thumb_cart">
                                <img src="{{ asset('img') }}/products/product_placeholder_square_medium.jpg"
                                    data-src="{{ asset('img') }}/products/shoes/5.jpg" alt="Product Image">
                            </div>
                            @if (!isset($order_item['product']['name']))
                                {{ $order_item->id }}
                            @endif
                            <span class="item_cart">{{ $order_item->product->name }}-{{ $order_item->variant->name }}</span>
                            <?php $order_total += $order_item->price * $order_item->units; ?>
                        </td>
                        <td>
                            <strong>${{ $order_item->price }}.00</strong>
                        </td>
                        <td>
                            {{ $order_item->units }}
                        </td>
                        <td>
                            <strong>${{ $order_item->price * $order_item->units }}.00</strong>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- Order Summary -->
    <div class="box_cart">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <ul>
                        <li>
                            <span>Order Status</span> {{ ucfirst($order->status) }}
                        </li>
                        <li>
                            <span>Shipping Status</span> Shipped
                        </li>
                        <li>
                            <span>Payment Status</span> Verified
                        </li>
                        <li></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <ul>
                        <li>
                            <span>Subtotal</span> ${{ $order->sub_total }}.00
                        </li>
                        <li>
                            <span>Shipping</span> $0.00
                        </li>
                        <li>
                            <span>Discount</span> ${{ $order->discount }}.00
                        </li>
                        <li>
                            <span>Tax</span> ${{ $order->tax }}.00
                        </li>
                        <li>
                            <span>Total</span> ${{ $order->total }}.00
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('optional_css')
    <link href="{{ asset('css') }}/cart.css" rel="stylesheet">
@endsection
