@extends('layouts.dashboard')

@section('title')
    Главная
@endsection

@section('content')
<h1 class="">Категории</h1>
<div class="scroll_container">
    @foreach ($tags as $tag)
    <a href="{{ route('tag.index', ['tag' => $tag]) }}">
        <div class="card">
            <div>{{ $tag->name }}</div>
            <div>{{ $tag->words_count }}</div>
        </div>
    </a>
    @endforeach
</div>

<h1 class="">Популярные слова</h1>
<div class="scroll_container">
    @foreach ($views as $view)
    <a href="{{ route('word.index', ['word' => $view]) }}">
        <div class="card">
            <div>{{ $view->word }}</div>
        </div>
    </a>
    @endforeach
</div>

@auth
    @if($viewed->count())
    <h1 class="">Ваши просмотры</h1>
    <div class="scroll_container">
        @foreach ($viewed as $view)
        <a href="{{ route('word.index', ['word' => $view]) }}">
            <div class="card">
                <div>{{ $view->word }}</div>
            </div>
        </a>
        @endforeach
    </div>
    @endif
@endauth
@endsection
