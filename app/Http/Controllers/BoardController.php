<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
  public function index(Request $request) {
    $user = Auth::user();
    $items = Board::all();
    return view("board.index", ["user"=>$user, "items"=>$items]);
  }
  public function add(Request $request) {
    $user = Auth::user();
    return view("board.add", ["user"=>$user]);
  }
  public function create(Request $request) {
    $user = Auth::user();
    $this->validate($request, Board::$rules);
    $board = new Board;
    $form = $request->all();
    unset($form["_token"]);
    $board->fill($form)->save();
    return redirect("/board");
  }
  #インスタンスの更新
  public function edit(Request $request) {
    $user = Auth::user();
    $board = Board::find($request->id);
    return view("board.edit", ["user"=>$user, "board"=>$board]);
  }
  public function update(Request $request) {
    $this->validate($request, Board::$rules);
    $board = Board::find($request->id);
    $form = $request->all();
    unset($form["_token"]);
    $board->fill($form)->save();
    return redirect("/board");
  }
  #インスタンスの削除
  public function delete(Request $request) {
    $user = Auth::user();
    $board = Board::find($request->id);
    return view("board.del", ["user"=>$user, "form"=>$board]);
  }
  public function remove(Request $request) {
    Board::find($request->id)->delete();
    return redirect("/board");
  }

}
