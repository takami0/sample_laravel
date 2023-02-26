@extends("layouts.helloapp")

@section("title", "Board.index")

  @section("menubar")
    @parent
    投稿（一覧）
  @endsection

  @section("content")
    <li><a href="board/add">新規投稿</a></li>
    <table>
      <tr>
        <th>投稿者</th>
        <th>タイトル</th>
        <th>内容</th>
        <th></th>
      </tr>
      @foreach ($items as $item)
      <tr>
        <td>{{$item->user->name}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->message}}</td>
        @if($user->id == $item->user_id)
          <td><a href="board/{{$item->id}}/edit">編集</a></td>
          <td><a href="board/{{$item->id}}/delete">削除</a></td>
        @endif
      </tr>
      @endforeach
    </table>
  @endsection

  @section("footer")
    ヘッダー
  @endsection