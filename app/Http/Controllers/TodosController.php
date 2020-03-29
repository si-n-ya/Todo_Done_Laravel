<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use \Auth;

use App\Todo;
use App\Memo;
use App\Done;
use App\User;

class TodosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(Request $request)
    {
        $todos = Todo::where('user_id', Auth::user()->id)->orderBy('time', 'asc')->get();
        $user = User::find(Auth::user()->id);
        $request->session()->put('todos', $todos);
        return view('index', [
            'user' => $user,
            'todos' => $todos
            ]);
    }

    public function todo_done(Request $request)
    {
        $calender_date = new \DateTime($request->id);
        $memos = Todo::join('memos', 'todos.id', '=', 'memos.todo_id')->where('todos.calender_date', $calender_date)->get();
        if (empty($memos)) {
            $memos = '';
        }

        $todos = Todo::where('calender_date', $calender_date->format('Y-m-d'))->where('user_id', Auth::user()->id)->get();

        $dones = Done::where('calender_date', $calender_date->format('Y-m-d'))->where('user_id', Auth::user()->id)->get();

        // doneをupdate後に、doneリストの画面に戻るためのsession
        if ($request->done === 'on' || $request->session()->get('is_modal') == 'on') {
            $is_modal = 'on';
            $is_modal_contents = 'on';
            $request->session()->forget('is_modal');
        // $request->session()->flush();
        } else {
            $is_modal = '';
            $is_modal_contents = '';
        }
        
        return view('todo_done.index', [
            'todos' => $todos,
            'dones' => $dones,
            'calender_date' => $calender_date,
            'memos' => $memos,
            'is_modal' => $is_modal,
            'is_modal_contents' => $is_modal_contents,
            ]);
    }

    public function create(TodoRequest $request, $id)
    {
        $todo = new Todo;
        /*
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        */
        $calender_date = new \DateTime($id);

        $todo->user_id = Auth::user()->id;
        $todo->title = $request->new_todo;
        $todo->time = $request->todo_new_time;
        $todo->calender_date = $calender_date->format('Y-m-d');
        unset($request->_token);
        $todo->save();
        return redirect('/todo_done/index?id=' . $calender_date->format('Y-m-d'));
    }

    public function edit($id)
    {
        // $todo = Todo::where('id', $id)->first();
        $todo = Todo::find($id);
        return view('todo_done.edit', [
            'todo' => $todo,
            ]);
    }

    public function update(TodoRequest $request, $id)
    {
        $todo = Todo::find($id);
        $todo->title = $request->new_todo;
        $todo->time = $request->conf_time;
        unset($request->_token);
        $todo->save();

        return redirect('/todo_done/index?id=' . $todo->calender_date);
    }

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect()->back();
    }

    public function ajax(Request $request)
    {
        if ($request->mode == 'state_update') {
            $todo = Todo::find($request->id);
            $todo->state = ($todo->state + 1) % 2;
            $todo->save();
        }
        return response()->json(['state' => $todo->state]);
    }
}