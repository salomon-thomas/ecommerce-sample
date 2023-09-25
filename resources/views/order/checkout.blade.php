@extends('layouts.app')

@section('content')
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('cart.list') }}">Cart</a></li>
                        <li><a href="{{ route('checkout.preview') }}">Checkout</a></li>
                    </ul>
                </ul>
            </div>
            <h1>Checkout/Place Order</h1>

        </div>
        <!-- /page_header -->
        <form method="POST" action="{{ route('place.order') }}">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="step first">
                        <h3>1. User Info and Billing address</h3>

                        <div class="box_account">
                            <div class="form_container">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        name="first_name" id="first_name" placeholder="First Name*"
                                        value="{{ old('first_name') }}" required autofocus>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        name="last_name" id="last_name" placeholder="Last Name*"
                                        value="{{ old('last_name') }}" required autofocus>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        name="city" id="city" placeholder="City*" value="{{ old('city') }}"
                                        required autofocus>
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                        name="postal_code" id="postal_code" placeholder="Postal Code*"
                                        value="{{ old('postal_code') }}" required autofocus>
                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('telephone') is-invalid @enderror"
                                        name="telephone" id="telephone" placeholder="Telephone*"
                                        value="{{ old('telephone') }}" required autofocus>
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /form_container -->
                        </div>
                    </div>
                    <!-- /step -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="step middle payments">
                        <h3>2. Payment and Shipping</h3>
                        <ul>
                            <li>
                                <label class="container_radio">Credit Card<a href="#0" class="info"
                                        data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="payment" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_radio">Paypal<a href="#0" class="info" data-bs-toggle="modal"
                                        data-bs-target="#payments_method"></a>
                                    <input type="radio" name="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_radio">Cash on delivery<a href="#0" class="info"
                                        data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_radio">Bank Transfer<a href="#0" class="info"
                                        data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                        <div class="payment_info d-none d-sm-block">
                            <figure><img src="img/cards_all.svg" alt=""></figure>
                            <p>Sensibus reformidans interpretaris sit ne, nec errem nostrum et, te nec meliore philosophia.
                                At
                                vix quidam periculis. Solet tritani ad pri, no iisque definitiones sea.</p>
                        </div>

                        <h6 class="pb-2">Shipping Method</h6>


                        <ul>
                            <li>
                                <label class="container_radio">Standard shipping<a href="#0" class="info"
                                        data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="shipping" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_radio">Express shipping<a href="#0" class="info"
                                        data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="shipping">
                                    <span class="checkmark"></span>
                                </label>
                            </li>

                        </ul>

                    </div>
                    <!-- /step -->

                </div>
                <div class="col-lg-4 col-md-6">
                    <?php $total = 0; ?>
                    <div class="step last">
                        <h3>3. Order Summary</h3>
                        <div class="box_general summary">
                            <ul>
                                @foreach ($cart as $cart_item)
                                    <li class="clearfix"><em>{{ $cart_item->units }}x
                                            {{ $cart_item->product->name }}</em>
                                        <span>${{ $cart_item->variant->price }}.00</span>
                                    </li>
                                    <?php $total += $cart_item->variant->price * $cart_item->units; ?>
                                @endforeach
                            </ul>
                            <ul>
                                <li class="clearfix"><em><strong>Subtotal</strong></em>
                                    <span>${{ $total }}.00</span>
                                </li>
                                <li class="clearfix"><em><strong>Shipping</strong></em> <span>$0</span></li>

                            </ul>
                            <div class="total clearfix">TOTAL <span>${{ $total }}.00</span></div>
                            <input type="submit" value="Confirm and Pay" class="btn_1 full-width">
                        </div>
                        <!-- /box_general -->
                    </div>
                    <!-- /step -->
                </div>
            </div>
        </form>
        <!-- /row -->
    </div>
@endsection


@section('optional_css')
    <link href="{{ asset('css') }}/checkout.css" rel="stylesheet">
@endsection
