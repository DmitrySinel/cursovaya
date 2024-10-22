@extends('layouts.dashboard')

@section('title')
    Результат
@endsection

@section('content')
<script>
    function preventBack() {
        window.history.forward();
    }

    setTimeout("preventBack()", 0);

    window.onunload = function () { null };
</script>
<div class="print">
    <div class="testContainer">
        <div class="head">Баллы: {{ $trueCount }}</div>
        <div class="answerContainer">
            <table class="table">
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
            <input class="submitButton" type="button" value="Напечатать результат" onClick="window.print()" />
        </div>
    </div>
</div>


@endsection
