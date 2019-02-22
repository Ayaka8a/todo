<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザ情報に関係するaction追加。今は仮
    public function edit()
 {
 return view('todo_user.edit');
 }
 
 /*public function update()
 {
 return redirect('todo_user/edit');
}*/
}
