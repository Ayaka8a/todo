<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('todo/create', 'TodoController@add')->middleware('auth');
Route::post('todo/create', 'TodoController@create');

Route::get('todo', 'TodoController@index');
Route::get('todo/edit', 'TodoController@edit');
Route::post('todo/edit', 'TodoController@update');
Route::get('todo/delete', 'TodoController@delete');


Route::get('todo_user/edit', 'UserController@edit')->middleware('auth');
/*Route::get('todo_user/edit', 'UserController@update');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
