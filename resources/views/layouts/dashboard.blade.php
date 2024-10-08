<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <header class="dashboardHeader">
        <div class="dashboardHeaderLogo">
            Английский
        </div>
        <div class="dashboardHeaderNav">
            @auth
            <div class="dashboardHeaderLogo">
                <a href="{{ route('home') }}">Аккаунт</a>
            </div>
            <div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="Выйти">
                </form>
            </div>
            @endauth
            @guest
            <div class="dashboardHeaderLogo">
                <a href="{{ route('login') }}">Войти</a>
            </div>
            @endguest
        </div>
    </header>
    <div class="dashboardSidebar">
        <a href="{{ route('main.index') }}" class="dashboardButton">Главная</a>
        <a href="{{ route('words.index') }}" class="dashboardButton">Слова</a>
        <a href="{{ route('tags.index') }}" class="dashboardButton">Теги</a>
        <a href="{{ url()->previous() }}" class="dashboardButton">Назад</a>
    </div>
    <div class="dashboardBody">
        @yield('content')
    </div>
</body>
</html>
