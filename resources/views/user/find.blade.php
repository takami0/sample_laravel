@extends("layouts.helloapp")

@section("title", "User.find")

  @section("menubar")
    @parent
    検索ページ
  @endsection

  @section("content")
  <form action="/user/find" method="post">
    @csrf
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="検索">
  </form>
    @if (isset($search_user))
    <table>
      <tr>
        <th>名前</th>
      </tr>
      @foreach ($search_user as $each)
      <tr>
        <td>{{$each->name}}</td>
      </tr>
      @endforeach
    </table>
    @endif
  @endsection

  @section("footer")
    ヘッダー
  @endsection