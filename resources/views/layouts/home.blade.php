<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DSport</title>
    <link rel="icon" href="{{ asset('/image/logo.png') }}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    {{-- swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- toast --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    {{-- link css --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product_details.css') }}">

    <link rel="stylesheet" href="{{ asset('css/shopping_cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">

</head>

<body>
    <div class="container">
        {{-- nav-bar --}}
        @include('partials.home.header_home')
        {{-- content --}}
        @yield('content')
        {{-- footer --}}
        @include('partials.home.footer_home')

    </div>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- main js --}}
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/detail.js') }}"></script>
    <script src="{{ asset('js/product.js') }}"></script>
    <script src="{{ asset('js/products.js') }}"></script>
    {{-- <script src="{{ asset('js/cart.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js">
    </script>
    @if(Session::has('success'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{Session::get('success')  }}",
            showHideTransition: 'slide',
            position: 'top-center',
            icon: 'success'
            })
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{Session::get('error')  }}",
            showHideTransition: 'slide',
            position: 'top-center',
            icon: 'error'
            })
    </script>
    @endif
    {{-- @yield('script') --}}


</body>

</html>