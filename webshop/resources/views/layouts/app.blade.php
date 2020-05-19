<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2e54adaa1a.js" crossorigin="anonymous"></script>
@stack('scripts')

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Belépés') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Regisztráció') }}</a>
                            </li>
                            @endif
                            @else
                        <div class="dropdown">
                            <span class="badge badge-info" id="notification_number">10</span>
                            <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                                <i class="fa fa-bell-o"></i>
                            </a>

                            <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">

                                <div class="notification-heading"><h4 class="menu-title">Értesítések</h4>
                                </div>
                                <li class="divider"></li>
                                <div class="notifications-wrapper">
                                    <a class="content" href="#">
                                        <div class="notification-item">
                                            <h4 class="item-title">Evaluation Deadline 1 · day ago</h4>
                                            <p class="item-info">Marketing 101, Video Assignment</p>
                                        </div>
                                    </a>
                                </div>
                                <li class="divider"></li>
                            </ul>

                        </div>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->profile->getFullName() }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile_view') }}">
                                        {{ __('Profil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('products_view') }}">
                                        {{ __('Saját Termékek') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('offer_view') }}">
                                        {{ __('Saját Ajánlatok') }}

                                    </a>
                                    @if(Auth::user()->isAdmin())
                                        <a class="dropdown-item" href="{{ route('categories_view') }}">
                                            {{ __('Kategóriák') }}

                                        </a> <a class="dropdown-item" href="{{ route('users_view') }}">
                                            {{ __('Felhasználók') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>


                        @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
