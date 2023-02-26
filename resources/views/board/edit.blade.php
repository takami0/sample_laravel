@extends("layouts.helloapp")

@section("title", "Board.Edit")

  @section("menubar")
    @parent
    投稿・編集ページ
  @endsection

  @section("content")
  @if (count($errors) > 0)
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="/board/edit" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{$board->id}}">
      <tr>
        <th> name: </th>
        <td> <input type="text" name="title" value="{{ $board->title }}"> </td>
      </tr>
      <tr>
        <th> mail: </th>
        <td> <input type="text" name="message" value="{{ $board->message }}"> </td>
      </tr>
        <th></th>
        <td> <input type="submit" value="更新"> </td>
      </tr>
    </table>
  </form>
  @endsection

  @section("footer")
    ヘッダー
  @endsection