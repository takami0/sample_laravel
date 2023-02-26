@extends("layouts.helloapp")

@section("title", "ユーザー認証")

@section("menubar")
  @parent
  ユーザー認証ページ
@endsection

@section("content")
  <p>{{$msg}}</p>
  <form action="/person/auth" method="post">
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
  未登録の方は<a href="/register">こちら</a>

@endsection

@section("footer")
  copyright 2020 tuyano.
@endsection