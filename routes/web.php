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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", "UserController@index")
 ->middleware("auth");
Route::get("user/auth", "UserController@getAuth")
    ->name("login");
Route::post("user/auth", "UserController@postAuth");
Route::get("user/logout", "UserController@delAuth");
Route::get("user/register", "UserController@getRegister")
    ->name("register");
Route::post("user/register", "UserController@postRegister");


Route::get("user/find", "UserController@find");
Route::post("user/find", "UserController@search");

Route::get("/board", "BoardController@index");
Route::get("board/add", "BoardController@add");
Route::post("board/add", "BoardController@create");
Route::get("board/{id}/edit", "BoardController@edit");
Route::post("board/edit", "BoardController@update");
Route::get("board/{id}/delete", "BoardController@delete");
Route::post("board/del", "BoardController@remove");





Route::get("person/find", "PersonController@find");
Route::post("person/find", "PersonController@search");


