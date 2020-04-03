<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:regular,bold,bolditalic" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/open-iconic-master/font/css/open-iconic-bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name', '') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @if(Auth::check() && Auth::user()->isAdmin())

                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">home</a>
                        </li>

                    </ul>

            @endif

            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @auth
                        @if(auth()->user()->ego())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}" > 🏠 </a>
                            </li>
                        @endif
                    @endauth

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
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                @if(Auth::user()->isAdmin())

                                    <a class="dropdown-item" href="{{ route('home') }}">🏠 Home</a>

                                    <a class="dropdown-item" href="{{ url('https://asuli.hu/login') }}">🇬🇧 asuli.hu</a>
                                    <a class="dropdown-item" href="{{ url('https://olaszsuli.hu/login') }}">🇮🇹 olaszsuli.hu</a>
                                    <a class="dropdown-item" href="{{ url('https://spaeng.hu/login') }}">🇪🇸 spaeng.hu</a>
                                    <a class="dropdown-item" href="{{ url('https://spama.hu/login') }}">🇪🇸 spama.hu</a>
                                    <a class="dropdown-item" href="{{ url('https://spanishbootcamp.es/login') }}">🇪🇸 spanishbootcamp.es</a>
                                    <a class="dropdown-item" href="{{ url('https://spanyolsuli.hu/login') }}">🇪🇸 spanyolsuli.hu</a>

                                @endif

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 container">
        @yield('content')
    </main>
</div>
</body>
</html>
