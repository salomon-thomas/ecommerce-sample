@extends('layouts.app')
@section('content')
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('order.list') }}">Orders</a></li>

                </ul>
            </div>
            <h1>Order History</h1>
        </div>
        <!-- /page_header -->

        <!-- Order List Table -->
        <table class="table table-striped order-list">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>PL-{{ 160000 + $order->id }}</td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        <td>${{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('order.details', ['orderId' => $order->id]) }}">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /Order List Table -->
        {{ $orders->links() }}
    </div>
@endsection
@section('optional_css')
    <link href="{{ asset('css') }}/cart.css" rel="stylesheet">
@endsection
