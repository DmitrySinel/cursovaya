@extends('layouts.dashboard')

@section('title')
    Результат
@endsection

@section('content')

<div class="print">
    <div>
        <div class="wordCard">Баллы: {{ $trueCount}}</div>
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
        <form>
            <input type="button" value="Напечатать результат" onClick="window.print()" />
        </form>
    </div>
</div>


@endsection
