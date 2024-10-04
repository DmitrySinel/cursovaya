@extends('layouts.dashboard')

@section('title')
    Тест
@endsection

@section('content')

<form action="{{ route('wordtest.index', ['tagId' => $tagId, 'answer' => $answer, 'word' => $test['original']->word]) }}" method="POST">
    @csrf
    <div class="wordCard">
        {{ $test["original"]->word }}
        @foreach ($test["variants"] as $variant)
        <div>
            <input type="radio" name="otv" value="{{ $variant->word == $test['translate']->word ? 1 : 0 }}" />
            <span>{{ $variant->word }}</span>
        </div>
        @endforeach
    </div>
    <button type="submit" class="border-0 bg-transparent">
        Ответить
    </button>
</form>

@endsection
