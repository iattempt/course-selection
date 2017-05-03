<form action="" method="POST">
  {{ csrf_field() }}
  <td>
    Auto
  </td>
  <td>
    <input type="text" name="name" autofocus>
  </td>
  <td>
    <input type="email" name="email">
  </td>
  <td>
    <input type="password" name="password">
  </td>
  <td>
    <input type="text" name="type">
  </td>
  <td colspan="2">
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
