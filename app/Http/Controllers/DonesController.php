<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DoneRequest;
use\Auth;

use App\Done;

class DonesController extends Controller
{
    //
    public function create(DoneRequest $request)
    {
        $done = new Done;
        $done->user_id = Auth::user()->id;
        $done->title = $request->new_done;
        $done->time = $request->done_new_time;
        $done->calender_date = $request->id;
        unset($request->_token);
        $done->save();

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $done = Done::find($request->id);
        return view('todo_done.edit', ['done' => $done]);
    }

    public function update(DoneRequest $request)
    {
        $done = Done::find($request->id);
        $done->title = $request->new_done;
        $done->time = $request->conf_time;
        unset($request->_token);
        $done->save();

        // doneリストにリダイレクトするため（todo_doneにリダイレクトした時に、sessionの有無を調べる）
        $request->session()->put('is_modal', 'on');

        return redirect()->action('TodosController@todo_done', ['id' => $done->calender_date,
        'done' => 'on']);
    }

    public function delete(Request $request)
    {
        Done::find($request->id)->delete();
        return redirect()->back();
    }
}