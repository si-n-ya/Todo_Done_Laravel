@extends('layouts.layout')

@if (isset($todo))
@section('title', 'Todoリストの編集確認')
@elseif (isset($done))
@section('title', 'Doneリストの編集確認')
@elseif (isset($memo))
@section('title', 'Memoリストの編集確認')
@endif

@section('content')
<div class="container">
    <div class="conf_container">
        @if (isset($todo))
        <!-- todoリストの編集 -->
        <h1 class="main_title todo_main_title conf_title">Todoリストの編集確認</h1>
        <form action="{{ action('TodosController@update', $todo->id) }}" method="post" class="form conf_form">
            {{ csrf_field() }}
            <dl>
                <dt class="todo_form_dt"><label for="conf_time">予定時刻</label></dt>
                <dd class="todo_time_box">
                    <select id="conf_time" class="todo_new_time" name="conf_time">
                        @for ($i = 1; $i <= 24; $i++) <option value="{{ $i }}"
                            {{ old('conf_time', $todo->time) == $i ? 'selected': '' }}>
                            {{ $i }}:00
                            </option>
                            @endfor
                    </select>
                </dd>
                <dt class="todo_form_dt"><label for="conf_todo">Todo</label></dt>
                <dd class="new_todo_box">
                    <input type="text" id="new_todo" class="new_todo" name="new_todo"
                        value="{{ old('new_todo', $todo->title) }}">
                    @if ($errors->has('new_todo'))
                    <p class="error new_todo_error">{{ $errors->first('new_todo') }}</p>
                    @endif
                </dd>
            </dl>
            <p class="submit_todo_box">
                <input type="submit" class="submit design_todo_submit" value="更新">
            </p>
            <p class="btn_box  back_color_box back_box">
                <a href="/todo_done/index?id={{ $todo->calender_date }}" class="btn back_color">Todoリストへ戻る</a>
            </p>
        </form>
        <!-- Doneリストの編集 -->
        @elseif (isset($done))
        <h1 class="main_title done_main_title conf_title">Doneリストの編集確認</h1>
        <form action="{{ action('DonesController@update', ['id' => $done->id]) }}" method="post" class="form conf_form">
            {{ csrf_field() }}
            <dl>
                <dt class="done_form_dt"><label for="conf_time">予定時刻</label></dt>
                <dd class="done_time_box">
                    <select id="conf_time" class="done_new_time" name="conf_time">
                        @for ($i=1; $i <= 24; $i++) <option value="{{ $i }}"
                            {{ old('conf_time', $done->time) == $i ? 'selected' : '' }}>
                            {{ $i }}:00
                            </option>
                            @endfor
                    </select>
                </dd>
                <dt class="done_form_dt"><label for="conf_done">Done</label></dt>
                <dd class="new_done_box">
                    <input type="text" id="conf_done" class="new_done" name="new_done"
                        value="{{ old('new_done', $done->title) }}">
                    @if ($errors->has('new_done'))
                    <p class="error new_done_error">{{ $errors->first('new_done') }}</p>
                    @endif
                </dd>
            </dl>
            <p class="submit_done_box">
                <input type="submit" class="submit design_done_submit" value="更新">
            </p>
            <p class="btn_box  back_color_box back_box">
                <a href="/todo_done/index?id={{ $done->calender_date }}&done=on" class="btn back_color">Doneリストへ戻る</a>
            </p>
        </form>
        <!-- Memoリストの編集 -->
        @elseif(isset($memo))
        <h1 class="main_title memo_main_title conf_title">メモの編集確認</h1>
        <form action="{{ action('MemosController@update', $memo->id) }}" method="post" class="form conf_form">
            {{ csrf_field() }}
            <div class="memo_conf_box">
                <textarea name="memo" class="memo_textarea" cols="50"
                    rows="10">{{ old('memo', $memo->memo) }}</textarea>
                @if ($errors->has('memo'))
                <p class="error">{{ $errors->first('memo') }}</p>
                @endif
                <p class="submit_memo_box">
                    <input type="submit" class="submit design_memo_submit" value="更新">
                </p>
                <p class="btn_box back_color_box back_box">
                    <a href="/todo_done/memo?id={{ $memo->todo_id }}" class="btn back_color">メモ一覧へ戻る</a>
                </p>
            </div> <!-- .memo_conf_box -->
        </form>
        @endif
    </div> <!-- .conf_container -->
</div> <!-- .container -->
@endsection