<?php

use Illuminate\Support\Facades\Route;

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

#テンプレート
// Route::get("hello", "HelloController@index");
// Route::post("hello", "HelloController@post");

Route::get("person", "PersonController@index")
  ->middleware("auth");

#ログイン
Route::get("person/auth", "PersonController@getAuth");
Route::post("person/auth", "PersonController@postAuth");
Route::get("person/logout", "PersonController@delAuth");

Route::get("person/find", "PersonController@find");
Route::post("person/find", "PersonController@search");
#インスタンスの新規作成
Route::get("person/add", "PersonController@add");
Route::post("person/add", "PersonController@create");
#インスタンスの更新
Route::get("person/edit", "PersonController@edit");
Route::post("person/edit", "PersonController@update");
#インスタンスの削除
Route::get("person/del", "PersonController@delete");
Route::post("person/del", "PersonController@remove");

Route::get("board", "BoardController@index");
Route::get("board/add", "BoardController@add");
Route::post("board/add", "BoardController@create");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
