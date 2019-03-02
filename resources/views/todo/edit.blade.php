{{-- layouts/base.blade.phpを読み込む --}}
@extends('layouts.base')


{{-- base.blade.phpの@yield('title')に'MyTodo作成画面'を埋め込む --}}
@section('title', 'MyTodo作成画面')

{{-- base.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>MyTodo作成画面</h2>







                <form action="{{ action('TodoController@update') }}" method="post" enctype="multipart/form-data">

                                    @if (count($errors) > 0)
                                        <ul>
                                            @foreach($errors->all() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-md-2" for="name">todo名</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="name" value="{{ $todo_form->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2" for="deadline">期限</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="deadline" value="{{ $todo_form->deadline }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2" for="importance">重要度</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="importance" value="{{ $todo_form->importance }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2" for="processingschedule">処理予定日</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="processingschedule" value="{{ $todo_form->processingschedule }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2" for="content">内容</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="content" rows="10">{{ $todo_form->content }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2" for="group_id">グループ</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="group_id" value="{{ $todo_form->group_id }}">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value="{{ $todo_form->id }}">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary" value="更新">
                                </form>










            </div>
        </div>
    </div>
@endsection
