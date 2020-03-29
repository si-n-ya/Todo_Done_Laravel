@extends('layouts.layout')

@section('title', 'Memoリスト')

@section('content')
<div class="memo_container">
    <div class="container">
        <p class="btn_box memo_back_box">
            <a href="/todo_done/index?id={{ $todo->calender_date }}" class="btn memo_back back_color">Todoリストへ戻る</a>
        </p>
        <h1 class="main_title memo_main_title">Memoリスト</h1>
        <p class="explain">『{{ $todo->title }}』に関して、ご自由にお書きください！</p>
        <form action="{{ action('MemosController@create', $todo->id) }}" method="post" class="form memo_form">
            {{ csrf_field() }}
            <textarea name="memo" class="memo_textarea" rows="10">{{ old('memo') }}</textarea>
            @if ($errors->has('memo'))
            <p class="error">{{ $errors->first('memo') }}</p>
            @endif
            <p class="submit_memo_box">
                <input type="submit" class="submit design_memo_submit" value="メモを追加"></<input>
            </p>
        </form>
    </div> <!-- .container -->
    <div class="container">
        @foreach ($memos as $memo)
        <div class="list_one memo_">
            <ul class="memos">
                <li class="list_memo">
                    {{ $memo->memo }}
                </li>
            </ul>
            <div class="ed_de_box" data-id="">
                <p class="edit_btn edit_memo_box">
                    <a href="{{ action('MemosController@edit', $memo->id) }}"
                        class="todo_row_btn link_edit edit_memo">編集</a>
                </p>
                <p class="delete_btn_box delete_memo_box">
                    <a href="{{ action('MemosController@delete', ['id' => $memo->id]) }}"
                        class="todo_row_btn delete_btn shape_btn delete_memo">削除</a>
                </p>
            </div> <!-- .ed_de_box -->
        </div> <!-- .list_one -->
        @endforeach
    </div> <!-- .container -->
</div> <!-- .memo_container -->
@endsection