@extends('layouts.dashboard')

@section('title')
    Результат
@endsection

@section('content')

<div class="dashboardBody">
    <div style="display: none">{{ $i = 1 }}</div>
    <table>
        <tr>
            <th>Номер</th>
            <th>Слово</th>
            <th>Ответ</th>
        </tr>
        @foreach ($answers as $key => $answer)
        <tr>
            <td>{{ $loop->index + 1}}</td>
            <td>{{ $key }}</td>
            <td>{{ $answer == 1 ? 'Правильно' : 'Неправильно' }}</td>
        </tr>
        @endforeach
    </table>
</div>


@endsection
