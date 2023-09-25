@extends('layouts.app')

@section('content')
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                </ul>
            </div>
        </div>
        <!-- /page_header -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="box_account">
                    <h3 class="client">Already Client</h3>
                    <div class="form_container">
                        <!-- Add error messages here -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email*" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password*">
                            </div>
                            <div class="clearfix add_bottom_15">
                                <div class="checkboxes float-start">
                                    <label class="container_check">Remember me
                                        <input type="checkbox" name="remember">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="float-end"><a id="forgot" href="{{route('register')}}">New Client?</a></div>
                            </div>
                            <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
                        </form>

                        <!-- Add the "Lost Password?" section here -->
                        <div id="forgot_pw" style="display: none;">
                            <!-- ... -->
                        </div>
                    </div>
                    <!-- /form_container -->
                </div>
            </div>
        </div>

    @endsection


    @section('optional_css')
        <link href="{{ asset('css') }}/checkout.css" rel="stylesheet">
    @endsection
