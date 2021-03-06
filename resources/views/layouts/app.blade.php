<?php
    $links = config('dtype.links');
    $helps = config('dtype.helps');
    $legal_notices = config('dtype.legal_notices');
    $pay_methods = config('dtype.pay_methods');
    $socials = config('dtype.socials');  
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DeliveBoo') }}</title>
    <!-- Scripts -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- F.A -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        
        @include('layouts.partials.header')
        <main class=" ">
            @yield('content')
            <router-view></router-view>
        </main>
        
        @include('layouts.partials.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <!-- <script src="{{asset('js/partials/navbar_scroll.js')}}"></script>       -->
    
</body>
    <script>
        let height = document.documentElement.clientHeight * 0.96;
        window.onscroll = () => {
        const nav = document.querySelector('#top_nav');
        if(this.scrollY <= 55) nav.className = 'navbar navbar-expand-md navbar-light shadow-sm fixed-top'; else nav.className = 'nav_colored navbar navbar-expand-md navbar-light shadow-sm fixed-top';
        };

    </script>
</body>
</html>