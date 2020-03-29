@include('calender')

@extends('layouts.layout')

@section('title', 'todo_doneのカレンダーページ')

@section('content')
@php
$cal = new Calender();
@endphp
<main class="container">
    <p class="explain">{{ $user->name }}さん、カレンダーの日付をクリックして、Todoリストを作ろう！</p>
    <table border="0" class="table">
        <thead>
            <tr>
                <th class="calender_head"><a href="?t={{ $cal->prev }}">&laquo</a></th>
                <th colspan=" 5" class="calender_head">{{ $cal->yearMonth }}</th>
                <th class="calender_head"><a href="?t={{ $cal->next }}">&raquo</a></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="week sun">Sun</td>
                <td class="week">Mon</td>
                <td class="week">Tue</td>
                <td class="week">Wed</td>
                <td class="week">Thu</td>
                <td class="week">Fri</td>
                <td class="week sat">Sat</td>
            </tr>
            {{ $cal->show() }}
        </tbody>
        <tfoot>
            <tr>
                <th colspan="7" class="calender_foot"><a href="index.php" class="today_link">Today</a></th>
            </tr>
        </tfoot>
    </table>
</main>
@endsection