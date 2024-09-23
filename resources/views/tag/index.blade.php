@extends('layouts.dashboard')

@section('title')
    Тег - {{ $tag->name }}
@endsection

@section('content')
    <div class="wordHead">
        {{ $tag->name }}
    </div>
    <div>
        {{ $tag->words->count() }}
    </div>
    @if($examplesTag->count())
    <div class="scroll_container">
        @foreach ($examplesTag as $word)
        <a href="{{ route('word.index', ['word' => $word]) }}">
            <div class="card">
                <div>{{ $word->word }}</div>
            </div>
        </a>
        @endforeach
    </div>
    @endif
    <a href="{{ route('wordtest.index', ['tag' => $tag]) }}">
        <div>Пройти тест</div>
    </a>
@endsection
