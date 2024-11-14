@extends('layouts.dashboard')

@section('content')
<div class="substrate">
    <div class="informationContainer">Имя: {{ Auth::user()->name }}</div>
    <div class="informationContainer">Почта: {{ Auth::user()->email }}</div>
    <div class="informationContainer">Роль: {{ Auth::user()->role == App\Enums\RoleEnum::User ? 'Пользователь' : 'Администратор'}}</div>
    <div class="informationContainer">Очки: {{ Auth::user()->userSumResult() }}</div>
    <div class="informationContainer">Кол-во пройденных тестов: {{ Auth::user()->userTestCount() }}</div>
    <div class="informationContainer">Правильных ответов:
        @if(Auth::user()->userTestCount() != 0)
            {{ round(Auth::user()->userSumResult() / Auth::user()->userTestCount() * 10)}}%
        @else
            0%
        @endif
    </div>
</div>
@endsection
