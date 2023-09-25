<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Habel">
    <title>Allia|ECOM</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('img') }}/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('img') }}/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('img') }}/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{{ asset('img') }}/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{{ asset('img') }}/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('css') }}/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css') }}/style.css" rel="stylesheet">

    <!-- ICON CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('css') }}/home_1.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('css') }}/custom.css" rel="stylesheet">
    @yield('optional_css')

</head>

<body>
    @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
    <div id="page">
        @include('layouts.components.header')
        <main class="bg_gray">
            @include('layouts.alert')
            @yield('content')
        </main>
        @include('layouts.components.footer')
    </div>

    <div id="toTop"></div><!-- Back to top button -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('js') }}/common_scripts.min.js"></script>
    <script src="{{ asset('js') }}/main.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('js') }}/carousel-home.min.js"></script>

    @yield('optional_script')

    {{-- additional scripts --}}
    <script src="{{ asset('js') }}/custom/logout.js"></script>
    <script src="{{ asset('js') }}/custom/alert.js"></script>
    <script src="{{ asset('js') }}/custom/addToCart.js"></script>

</body>
