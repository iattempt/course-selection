<form action="" method="POST">
  {{ csrf_field() }}
  <td><!---->
    Auto
  </td>

  <td><!--修別名稱-->
    <input type="text" name="name" autofocus>
  </td>

  <td><!--修別種類-->
    <select class="form-control" name="type_base_id">
      @foreach ($general->lists as $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </td>

  <td colspan="2"><!---->
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
