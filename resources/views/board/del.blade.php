@extends("layouts.helloapp")

@section("title", "Board.delete")

  @section("menubar")
    @parent
    削除ページ
  @endsection

  @section("content")
  <form action="/board/del" method="post">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{$form->id}}">
      <tr>
        <th> title: </th>
        <td>{{ $form->title }}</td>
      </tr>
      <tr>
        <th> message: </th>
        <td>{{ $form->message }}</td>
      </tr>
      <tr>
        <th></th>
        <td> <input type="submit" value="削除"> </td>
      </tr>
    </table>
  </form>
  @endsection

  @section("footer")
    ヘッダー
  @endsection