<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project"> 

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->   
    <link rel="stylesheet" type="text/css" href="{{asset('app/styles/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/OwlCarousel2-2.2.1/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app/styles/shop_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/styles/shop_responsive.css')}}">
  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    {{-- vue --}}
    <script src="{{ asset('js/app.js') }}" ></script>


    <style>
    /* Customize */
        .card-header {
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0,0,0,.03); 
        background-color: rgb(14 140 228);
        border-bottom: unset;
        color: #ffffff;
        font-weight: bold;
        }
    /* / Customize */
    </style>
    @yield('css')
</head>
<body>
    <div id="app">
        <div class="super_container"> 
                <x-header />

                @yield('content') 

                <x-footer/> 

        </div> 
                
    </div>

    {{-- <div id="wishlist"></div> --}}
{{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> --}}


 

@yield('js') 



</body>
</html>
