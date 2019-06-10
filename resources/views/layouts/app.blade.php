{!! '<!-- Автор сайта: Калиновский Юрий -->' !!}
{!! '<!-- Автор html-макета: Xiaoying Riley at 3rd Wave Media -->' !!}
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_desc')">
    <meta name="keywords" content="@yield('meta_key')">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<header class="header">
    <div class="container">
        <a href="{{url('/')}}"><img class="profile-image img-responsive pull-left head_img" src="{{ asset('images/head_img.jpg') }}" alt="" /></a>
        <div class="profile-content pull-left">
            <h1 class="name">Калиновский Юрий</h1>
            <h2 class="desc">Back-end PHP Programmer</h2>
        </div>
        <ul class="nav navbar-nav navbar-right">
            @guest
                <li><a href="{{ route('login') }}" class="link_menu">Авторизация</a></li>
                <li><a href="{{ route('register') }}" class="link_menu">Регистрация</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle link_menu" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.index') }}" title="">Админка</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
</header>

<div class="container sections-wrapper">
    <div class="row">
        <div class="primary col-md-8 col-sm-12 col-xs-12">
            @yield('content')
        </div>
        <div class="secondary col-md-4 col-sm-12 col-xs-12">
            @include('layouts.aside')
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container text-center">
        <small class="copyright">2018 &sect; Laravel Framework</small>
    </div>
</footer>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>