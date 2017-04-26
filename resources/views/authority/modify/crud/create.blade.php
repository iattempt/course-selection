<form action="" method="POST">
  {{ csrf_field() }}
  <td>
    Auto
  </td>
  <td>
    <input type="text" name="name" autofocus>
  </td>
  <td>
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
