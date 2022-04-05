<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Эх Настя | Вход на сайт</title>
    <link rel="stylesheet" href="{{ URL::asset('4login/css/style.css') }}">
</head>
<body>
    <!-- если админ
    <meta http-equiv="refresh" content="0; url={{ url('/admin') }}">
    -->

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    На главную
                </a>
                 /
                @guest
                    @if (request()->is('register'))
                <a class="nav-link" href="{{ route('login') }}">Вход</a>
                    @elseif (request()->is('login'))
                <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                    @endif
                @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                 -
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endguest
            </div>
        </nav>

        <div class="middle">
            <h1>@yield('h1')</h1>
            <div id="fancy-inputs">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
