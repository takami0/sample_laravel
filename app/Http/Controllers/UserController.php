<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function getRegister() {
    return view("auth.register");
  }
  public function postRegister(Request $request) {
    $this->validate($request, User::$rules);
    $user = new User;
    $form = $request->all();
    unset($form["_token"]);
    $user->fill($form)->save();
    return redirect("/");
  }

  #ユーザ認証（GET）
  public function getAuth(Request $request) {
    $msg = "ログインしてください。";
    return view("user.auth", ["msg"=>$msg]);
  }
  #ユーザ認証（POST）
  public function postAuth(Request $request) {
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(["email" =>$email, "password" =>$password])) {
      return redirect("/");
    }
    else {
      $msg = "ログインに失敗しました。再度お試しください";
      return view("user.auth", ["msg"=>$msg]);
    }
  }
  #ユーザ認証（DELETE）
  public function delAuth(Request $request) {
    Auth::logout();
    return redirect("user/auth");
  }

  #INDEX
  public function index(Request $request) {
    $user = Auth::user();
    $users = User::all();
    return view("user.index", ["users" => $users]);
  }
  public function find(Request $request) {
    $user = Auth::user();
    $search_user = User::where("name", $request->input)->get();
    return view("user.find", ["user"=>$user, "input" => "", $param]);
  }
  public function search(Request $request) {
    $user = Auth::user();
    $search_user = User::where("name", $request->input)->get();
    $param = ["input" => $request->input, "user"=>$user];
    return view("user.find", $param);
  }


}
