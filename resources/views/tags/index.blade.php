@extends('layouts.dashboard')

@section('title')
    Все теги
@endsection

@section('content')
    @foreach ($tags as $tag)
        <div class="wordContainer">
            <a href="{{ route('tag.index', ['tag' => $tag]) }}">
                <div class="wordCard">
                    <span>
                        {{ $tag->name }}
                    </span>
                    <br>
                    <span>
                        {{ $tag->words->count() }}
                    </span>
                </div>
            </a>
        </div>
    @endforeach
    <div>
        {{ $tags->links('pagination::bootstrap-4') }}
    </div>
@endsection
