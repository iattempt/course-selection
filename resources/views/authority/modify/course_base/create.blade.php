<form action="" method="POST">
  {{ csrf_field() }}
  <td><!---->
    Auto
  </td>

  <td><!--名字-->
    <input type="text" name="name" autofocus>
  </td>

  <td><!--學分-->
    <select class="form-control" name="credit">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3" selected>3</option>
    </select>
  </td>

  <td colspan="2"><!---->
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
