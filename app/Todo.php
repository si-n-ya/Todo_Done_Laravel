<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $guarded = ['id'];

    public static $rules = [
            'new_todo' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function memos()
    {
        return $this->hasMany('App\Memo');
    }
}