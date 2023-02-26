<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
  #ユーザ認証（GET）
  public function getAuth(Request $request) {
    $msg = "ログインしてください。";
    return view("person.auth", ["msg"=>$msg]);
  }
  #ユーザ認証（POST）
  public function postAuth(Request $request) {
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(["email" =>$email, "password" =>$password])) {
      return redirect("/person");
    }
    else {
      $msg = "ログインに失敗しました。";
      return view("person.auth", ["msg"=>$msg]);
    }
  }
  #ユーザ認証（DELETE）
  public function delAuth(Request $request) {
    Auth::logout();
    return redirect("person/auth");
  }

  #INDEX
  public function index(Request $request)
  {
    $user = Auth::user();
    $items = Person::all();
    return view("person.index", ["items" => $items]);
  }
  #インスタンスの新規作成
  public function add(Request $request) {
    return view("person.add");
  }
  public function create(Request $request) {
    $this->validate($request, Person::$rules);
    $person = new Person;
    $form = $request->all();
    unset($form["_token"]);
    $person->fill($form)->save();
    return redirect("/person");
  }
  #インスタンスの更新
  public function edit(Request $request) {
    $person = Person::find($request->id);
    return view("person.edit", ["form"=>$person]);
  }
  public function update(Request $request) {
    $this->validate($request, Person::$rules);
    $person = Person::find($request->id);
    $form = $request->all();
    unset($form["_token"]);
    $person->fill($form)->save();
    return redirect("/person");
  }
  #インスタンスの削除
  public function delete(Request $request) {
    $person = Person::find($request->id);
    return view("person.del", ["form"=>$person]);
  }
  public function remove(Request $request) {
    Person::find($request->id)->delete();
    return redirect("/person");
  }

    public function find(Request $request) #処理：GET
  {
    return view("person.find", ["input" => ""]);
  }
  public function search(Request $request) #処理：POST
  {
    $min = $request->input *1;
    $max = $min + 10;
    $item = Person::ageGreaterthan($min)->ageLessThan($max)->first();
    $param = ["input" => $request->input, "item"=>$item];
    return view("person.find", $param);
  }

}

