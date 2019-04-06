<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos;
use App\History;
use Carbon\Carbon;

class TodoController extends Controller
{
    //
    public function add()
  {
      return view('todo.create');
  }

  public function create(Request $request)
    {
      // 以下を追記
      // Varidationを行う
      $form = $request->all();
      $form["deadline"] = "2019-02-22 12:02:24";
      $form["processingschedule"] = "2019-02-22 12:13:59";
      $this->validate($request, Todos::$rules);

      $todos = new Todos;


      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $todos->fill($form);
      $todos->save();
      // admin/news/createにリダイレクトする
        return redirect('todo/create');
    }

    public function index(Request $request)
     {
         $cond_title = $request->cond_title;
         if ($cond_title != '') {
             // 検索されたら検索結果を取得する
             $posts = Todos::where('name', $cond_title)->get();
         } else {
             // それ以外はすべてのニュースを取得する
             $posts = Todos::all();
         }
         return view('todo.index', ['posts' => $posts, 'cond_title' => $cond_title]);
     }


     public function edit(Request $request)
       {
           // News Modelからデータを取得する
           $todos = Todos::find($request->id);
           if (empty($todos)) {
             abort(404);
           }
           return view('todo.edit', ['todo_form' => $todos]);
       }


       public function update(Request $request)
       {
           // Validationをかける
           $this->validate($request, Todos::$rules);
           // Todo Modelからデータを取得する
           $todos = Todos::find($request->id);
           // 送信されてきたフォームデータを格納する
           $todo_form = $request->all();
           unset($todo_form['_token']);

           // 該当するデータを上書きして保存する
           $todos->fill($todo_form)->save();

           $history = new History;
           $history->todos_id = $todos->id;
           $history->edited_at = Carbon::now();
           $history->save();

           return redirect('todo');
       }

       public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $todo = Todos::find($request->id);
      // 削除する
      $todo->delete();
      return redirect('todo');
  }


}
