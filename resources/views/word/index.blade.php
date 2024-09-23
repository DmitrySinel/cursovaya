@extends('layouts.dashboard')

@section('title')
    Слово - {{ $word->word }}
@endsection

@section('content')
    <div class="wordHead">
        {{ $word->word }}
    </div>
    <div>
        {{ $word->transcription }}
    </div>
    <div>
        <ul>
            @foreach ($word->translate as $translate)
                <li>{{ $translate->word }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        @foreach ($word->tag as $tag)
            <div>{{ $tag->name }}</div>
        @endforeach
    </div>
    <form action="{{ route('word.delete', $word) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">
            Удалить
        </button>
      </form>
@endsection
