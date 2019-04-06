<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    //

    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'name' => 'required',
        'deadline' => 'required',
        'processingschedule' => 'required',
        

    );
   //Todosモデルに関連付けを行う
   public function histories()
   {
     return $this->hasMany('App\History');
   }
}
