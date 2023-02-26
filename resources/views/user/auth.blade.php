@extends("layouts.helloapp")

@section("menubar")
  @parent
  ユーザー認証ページ
@endsection

@section("content")
  <p>{{$msg}}</p>
  <form action="/user/auth" method="post">
    <table>
      @csrf
      <tr>
        <th>mail:</th>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
         <th>pass:</th>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
      </tr>
    </table>
  </form>
  未登録の方は<a href="user/register">こちら</a>

@endsection

@section("footer")
  ヘッダー
@endsection