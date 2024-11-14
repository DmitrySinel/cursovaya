<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('js/select2/css/select2.min.css') }}">
</head>
<body>

    <header class="dashboardHeader">
        <div class="dashboardHeaderLogo">
            <a href="{{ route('main.index') }}">Английский</a>
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
        <a href="{{ route('word.index') }}" class="dashboardButton">Слова</a>
        <a href="{{ route('tags.index') }}" class="dashboardButton">Теги</a>
        @auth
            <a href="{{ route('suggest.create') }}" class="dashboardButton">Предложить слово</a>
        @endauth
        @if(auth()->check() && Auth::user()->role == App\Enums\RoleEnum::Admin)
            <a href="{{ route('suggest.index') }}" class="dashboardButton">Предложенные слова</a>
        @endif
    </div>
    <div class="dashboardBody">
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2({
            tags: true
        })

        $('#testForm').on('submit', function(e) {
            if($('input:checked').length === 0) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
