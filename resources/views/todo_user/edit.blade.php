{{-- layouts/base.blade.phpを読み込む --}}
@extends('layouts.base')


{{-- base.blade.phpの@yield('title')に'MyTodo作成画面'を埋め込む --}}
@section('title', 'ユーザ情報管理画面')

{{-- base.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ユーザー情報</h2>
            </div>
        </div>
    </div>
@endsection
