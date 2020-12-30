<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->   
    <link rel="stylesheet" type="text/css" href="{{asset('app/styles/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/OwlCarousel2-2.2.1/animate.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('app/styles/shop_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/styles/shop_responsive.css')}}">
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body>

    
    <div id="app">
        <div class="super_container"> 
                <x-header  message="$categories" /> 
                  
                @yield('content') 

                <x-footer/> 

        </div> 

        <loading-overlay /> 
    </div>
 
<!-- Scripts vue -->
<script  src="{{ asset('js/app.js') }}" ></script>
 
<script src="{{asset('app/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('app/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('app/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('app/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('app/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('app/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('app/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('app/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('app/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('app/plugins/easing/easing.js')}}"></script> 


@yield('js') 


</body>
</html>
