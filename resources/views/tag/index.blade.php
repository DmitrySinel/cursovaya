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
    <form action="{{ route('wordtest.index', ['tagId' => $tag, 'answer' => array()]) }}" method="POST">
        @csrf
        <button type="submit" class="border-0 bg-transparent">
            Пройти тест
        </button>
    </form>
@endsection
