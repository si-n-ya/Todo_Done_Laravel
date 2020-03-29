<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemoRequest;

use App\Memo;
use App\Todo;

class MemosController extends Controller
{
    //
    public function index(Request $request)
    {
        $todo = Todo::find($request->id);
        $memos = Memo::where('todo_id', $request->id)->latest()->get();
        return view('memos.index', [
            'todo' => $todo,
            'memos' => $memos
            ]);
    }

    public function create(MemoRequest $request, $id)
    {
        $memo = new Memo;
        $memo->todo_id = $id;
        $memo->memo = $request->memo;
        unset($request->_token);
        $memo->save();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $memo = Memo::find($request->id);
        return view('todo_done.edit', ['memo' => $memo]);
    }

    public function update(MemoRequest $request)
    {
        $memo = Memo::find($request->id);
        $form = $request->all();
        unset($request->_token);
        $memo->fill($form)->save();
        return redirect()->action('MemosController@index', ['id' => $memo->todo_id]);
        // return redirect('/todo_done/memo?id=' . $memo->todo_id);
    }

    public function delete(Request $request)
    {
        Memo::find($request->id)->delete();
        return redirect()->back();
    }
}