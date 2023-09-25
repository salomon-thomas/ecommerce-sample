<header class="version_1">
    <!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img') }}/logo.svg" alt="" width="100"
                                height="35"></a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="{{ route('home') }}"><img src="{{ asset('img') }}/logo_black.svg" alt=""
                                    width="100" height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>

                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                    <a class="phone_top" href="tel://+447769012345"><strong><span>Need Help?</span>+44
                            776-90-12345</strong></a>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Categories
                                    </a>
                                </span>
                                <?php $categories = getCategories(); ?>
                                <div id="menu">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li><span><a
                                                        href="{{ route('product.category', ['category' => $category->id]) }}">{{ $category->name }}</a></span>
                                                <ul>
                                                    <li><a
                                                            href="{{ route('product.category', ['category' => $category->id]) }}">Trending</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('product.category', ['category' => $category->id]) }}">Life
                                                            style</a></li>
                                                    <li><a
                                                            href="{{ route('product.category', ['category' => $category->id]) }}">Running</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('product.category', ['category' => $category->id]) }}">Training</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('product.category', ['category' => $category->id]) }}">View
                                                            all
                                                            Collections</a></li>
                                                </ul>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <div class="custom-search-input">
                        <input type="text" placeholder="Search over 10.000 products">
                        <button type="submit"><i class="header-icon_search_custom"></i></button>
                    </div>
                </div>
                <?php $cart_count = getCartCount(); ?>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="{{ route('cart.list') }}" id="cart_count"
                                    class="cart_bt"><strong>{{ $cart_count }}</strong></a>
                                <div class="dropdown-menu">
                                    <div class="total_drop">
                                        <a href="{{ route('cart.list') }}" class="btn_1 outline">View Cart</a>
                                        @auth
                                            @if ($cart_count > 0)
                                                <a href="{{ route('checkout.preview') }}" class="btn_1">Checkout</a>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                        <li>
                            <a href="#0" class="wishlist"><span>Wishlist</span></a>
                        </li>
                        <li>
                            <div class="dropdown dropdown-access">
                                <a @auth href="{{ route('profile.details') }}" @endauth
                                    @guest href="{{ route('login') }}" @endguest
                                    class="access_link"><span>Account</span></a>
                                <div class="dropdown-menu">
                                    @guest
                                        <a href="{{ route('login') }}" class="btn_1">Sign In or Sign Up</a>
                                    @endguest
                                    @auth
                                        <a id="logout" class="btn_1">Sign Out</a>
                                    @endauth
                                    <ul>
                                        @auth
                                            <li>
                                                <a href="{{ route('order.list') }}"><i class="ti-package"></i>My
                                                    Orders</a>
                                            </li>
                                        @endauth
                                        <li>
                                            <a href="#"><i class="ti-help-alt"></i>Help and Faq</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <input type="text" class="form-control" placeholder="Search over 10.000 products">
            <input type="submit" class="btn_1 full-width" value="Search">
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>
<!-- /header -->
