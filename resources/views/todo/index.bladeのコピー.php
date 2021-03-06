





{{-- layouts/base.blade.phpを読み込む --}}
@extends('layouts.base')


{{-- base.blade.phpの@yield('title')に'Todo一覧'を埋め込む --}}
@section('title', 'Todo一覧')

{{-- base.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')


<div class="container">
       <div class="row">
           <h2>TODO一覧</h2>
       </div>
       <div class="row">
           <div class="col-md-4">
               <a href="{{ action('TodoController@add') }}" role="button" class="btn btn-primary">新規作成</a>
           </div>
           <div class="col-md-8">
               <form action="{{ action('TodoController@index') }}" method="get">
                   <div class="form-group row">
                       <label class="col-md-2">タイトル</label>
                       <div class="col-md-8">
                           <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                       </div>
                       <div class="col-md-2">
                           {{ csrf_field() }}
                           <input type="submit" class="btn btn-primary" value="検索">
                       </div>
                   </div>
               </form>
           </div>
       </div>
月
       <div class="row">
           <div class="list-news col-md-12 mx-auto">
               <div class="row">
                   <table class="table table-light">
                       <thead>
                           <tr>
                               <th width="10%">ID</th>
                               <th width="20%">タイトル</th>
                               <th width="50%">本文</th>
                               <th width="10%">操作</th>
                           </tr>
                       </thead>
                       <tbody>

                           @foreach($posts as $todo)
                               <tr>
                                   <th>{{ $todo->id }}</th>
                                   <td>{{ str_limit($todo->name, 100) }}</td>
                                   <td>{{ str_limit($todo->content, 250) }}</td>
                                   <td>
                                       <div>
                                           <a href="{{ action('TodoController@edit', ['id' => $todo->id]) }}">編集</a>
                                       </div>
                                       <div>
                                           <a href="{{ action('TodoController@delete', ['id' => $todo->id]) }}">削除</a>
                                       </div>
                                   </td>

                               </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>






@endsection
