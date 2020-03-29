@extends('layouts.layout')

@section('title', 'todo_doneリスト')

@section('content')
<main class="main">
    @isset($todos)
    <div class="todo_all_container body_color">
        <div class="container">
            <p class="calender_date">{{ $calender_date->format('Y年m月d日') }}</p>
            <div class="btn_container">
                <p class="btn_box back_btn_box back_color_box">
                    <a href="/" class="btn back_color">カレンダーに戻る</a>
                </p>
                <p class="btn_box modal_btn_box">
                    <a href="/todo_done/index?id={{ $calender_date->format('Y-m-d') }}&done=on"
                        class="modal_btn">Doneリストを表示</a>
                </p>
            </div> <!-- .btn_container -->
            <!-- Todoリスト -->
            <h1 class="main_title todo_main_title">Todoリスト</h1>
            <form action="{{ action('TodosController@create', $calender_date->format('Y-m-d')) }}" method="post"
                class="form todo_form">
                {{ csrf_field() }}
                <dl>
                    <dt class="todo_form_dt"><label for="todo_new_time">何時に？</label></dt>
                    <dd class="todo_time_box">
                        <select id="todo_new_time" class="todo_new_time" name="todo_new_time">
                            @for ($i=1; $i<=24; $i++) <option value="{{ $i }}" {{ old('time') == $i ? 'selected': '' }}>
                                {{ $i }}:00
                                </option>
                                @endfor
                        </select>
                    </dd>
                    <dt class="todo_form_dt"><label for="new_todo">何をする？</label></dt>
                    <dd class="new_todo_box">
                        <input type="text" class="new_todo" id="new_todo" name="new_todo" value="{{ old('new_todo') }}">
                        @if ($errors->has('new_todo'))
                        <p class="error new_todo_error">{{ $errors->first('new_todo') }}</p>
                        @endif
                    </dd>
                </dl>
                <p class="submit_todo_box">
                    <input type="submit" class="submit design_todo_submit" value="Todoを追加">
                </p>
            </form>
        </div> <!-- .container -->
        <div class="container todo_container">
            <ul class="todos">
                <!-- 1:00〜24:00まで時間表示 -->
                @for ($i = 1; $i <= 24; $i++) <li class="todo_list">
                    <span class="todo_time">{{ $i }}:00</span>
                    <div class="todo_row_box">
                        @foreach ($todos as $todo)

                        @foreach ($memos as $memo)
                        <!-- memoとtodoのidが一致すれば -->
                        @if ($todo->id === $memo->todo_id)
                        @php
                        $is_memo = 'is_memo_count';
                        @endphp
                        @break
                        @else
                        @php
                        $is_memo = '';
                        @endphp
                        @endif
                        @endforeach

                        <!-- 時間とtodoの時間が一致すれば -->
                        @if ($i == $todo->time)
                        <div data-id="{{ $todo->id }}" class="todo_row todo_{{ $todo->id }}">
                            <div class="todo_title_box">
                                <input type="checkbox" class="check_update" {{ $todo->state === 1 ? 'checked': '' }}>
                                <span class="todo_title {{ $todo->state === 1 ? 'todo_finish': '' }}">
                                    <a href="/todo_done/memo?id={{ $todo->id }}" class="link_title">
                                        {{ $todo->title }}
                                        {{  isset($is_memo) && $is_memo == 'is_memo_count' ? '•••': '' }}
                                    </a>
                                </span>
                            </div> <!-- .todo_title_box -->
                            <div class="todo_btn_layout">
                                <span class="todo_btn_box edit_btn">
                                    <a href="{{ action('TodosController@edit', $todo->id) }}"
                                        class="todo_row_btn link_edit">編集</a>
                                </span>
                                <span class="todo_btn_box delete_btn_box">
                                    <a href="{{ action('TodosController@delete', ['id' => $todo->id]) }}"
                                        class="todo_row_btn delete_btn shape_btn">削除</a>
                                </span>
                            </div> <!-- .btn_layout -->
                        </div> <!-- .todo_row -->
                        @endif
                        @endforeach
                    </div> <!-- .todo_row_box -->
                    </li>
                    @endfor
            </ul>
        </div> <!-- .todo_container -->
    </div> <!-- .todo_all_container -->
    @endisset
    @isset ($dones)
    <!-- doneリスト -->
    <a href="{{ action('TodosController@todo_done', ['id' => $calender_date->format('Y-m-d')]) }}"
        class="modal {{ $is_modal === 'on' ? 'is_modal_active': '' }}">
    </a>
    <div class="done_all_container">
        <div class="modal_contents {{ $is_modal_contents === 'on' ? 'is_modal_contents_active': '' }}">
            <div class="container">
                <a href="{{ action('TodosController@todo_done', ['id' => $calender_date->format('Y-m-d')]) }}"
                    class="close_box">
                    <span class="close"></span>
                </a> <!-- .close_box -->
                <h1 class="main_title done_main_title">Doneリスト</h1>
                <form action="{{ action('DonesController@create', ['id' => $calender_date->format('Y-m-d')]) }}"
                    method="post" class="form done_form">
                    {{ csrf_field() }}
                    <dl>
                        <dt class="done_form_dt"><label for="done_new_time">何時に？</label></dt>
                        <dd class="done_time_box">
                            <select id="done_new_time" class="done_new_time" name="done_new_time">
                                <!-- 1:00〜24:00までの時間表示 -->
                                @for ($i=1; $i<=24; $i++) <option value="{{ $i }}">{{ $i }}:00</option>
                                    @endfor
                            </select>
                        </dd>
                        <dt class="done_form_dt"><label for="new_done">何をした？</label></dt>
                        <dd class="new_done_box">
                            <input type="text" id="new_done" class="new_done" name="new_done">
                            @if ($errors->has('new_done'))
                            <p class="error new_done_error">{{ $errors->first('new_done') }}</p>
                            @endif
                        </dd>
                    </dl>
                    <p class="submit_done_box">
                        <input type="submit" class="submit design_done_submit" value="Doneを追加">
                    </p>
                </form>
            </div> <!-- .container -->
            <div class="container done_container">
                <ul class="dones">
                    @for ($i=1; $i<=24; $i++) <li class="done_list">
                        <span class="done_time">{{ $i }}:00</span>
                        <div class="done_row_box">
                            @foreach ($dones as $done)
                            <!-- 時間とdoneの時間が一致すれば表示 -->
                            @if ($done->time === $i)
                            <div data-id="" class="done_row done_">
                                <div class="done_title_box">
                                    <span class="done_title">
                                        {{ $done->title }}
                                    </span>
                                </div> <!-- .done_title_box -->
                                <div class="done_btn_layout">
                                    <span class="done_btn_box edit_btn">
                                        <a href="{{ action('DonesController@edit', ['id' => $done->id]) }}"
                                            class="done_row_btn link_edit">編集</a>
                                    </span>
                                    <span class="done_btn_box delete_btn_box">
                                        <a href="{{ action('DonesController@delete', ['id' => $done->id]) }}"
                                            class="done_row_btn delete_btn shape_btn">削除</a>
                                    </span>
                                </div> <!-- .btn_layout -->
                            </div> <!-- .done_row -->
                            @endif
                            @endforeach
                        </div> <!-- .done_row_box -->
                        </li>
                        @endfor
                </ul>
            </div> <!-- .done_container -->
        </div> <!-- .modal_contents -->
    </div> <!-- done_all_container -->
    @endisset
</main>

@endsection