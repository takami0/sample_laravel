@extends("layouts.helloapp")

@section("title", "User.index")

@section("menubar")
  @parent
  利用者（一覧）
@endsection

@section("content")
  <a href="user/find">検索</a>
  <table>
    <tr>
      <th>名前</th>
    </tr>
    @foreach ($users as $each)
    <tr>
      <td>{{$each->name}}</td>
    </tr>
    @endforeach
  </table>
@endsection

@section("footer")
  ヘッダー
@endsection