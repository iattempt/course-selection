<form action="" method="POST">
  {{ csrf_field() }}
  <td>
    Auto
  </td>
  <td>
    <input class="form-control" type="text" name="name" autofocus>
  </td>
  <td>
    <input class="form-control" type="email" name="email">
  </td>
  <td>
    <input class="form-control" type="password" name="password">
  </td>
  <td colspan="2">
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
