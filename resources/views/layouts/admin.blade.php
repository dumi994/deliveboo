<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DeliveBoo') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'DeliveBoo') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex text-right" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class=" text-white dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <aside class="col-sm-2">
                        <ul class="nav flex-column py-3">
                            <li class="nav-item nav-pills">
                                <a class="nav-link {{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}}" href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
                            </li>
                            <li class="nav-item nav-pills">
                                <a class="nav-link {{Route::currentRouteName() == 'admin.dishes.index' ? 'active' : ''}}" href="{{route('admin.dishes.index')}}"><i class="fas fa-newspaper mr-2"></i> Piatti</a>
                            </li>
                            <li class="nav-item nav-pills">
                                <a class="nav-link {{Route::currentRouteName() == 'admin.orders.index' ? 'active': ''}}" href="{{route('admin.orders.index')}}"><i class="fas fa-newspaper mr-2"></i> Ordini</a>
                            </li>
                           <!--  <li class="nav-item nav-pills">
                                <a class="nav-link {{Route::currentRouteName() == '' ? 'active': ''}}" disabled><i class="fas fa-newspaper mr-2"></i> Statistiche</a>
                            </li> -->

                        </ul>
                    </aside>
                    <div class="col-sm-10">
                        @yield('content')
                    </div>

                </div>
            </div>
        </main>
        
    </div>
</body>

</html>