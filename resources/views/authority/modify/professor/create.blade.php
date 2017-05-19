<form action="" method="POST">
  {{ csrf_field() }}
  <td class="form-control">
    Auto
  </td>

  <td><!--名字-->
    <input class="form-control" type="text" name="name" autofocus>
  </td>

  <td><!--電子郵件-->
    <input class="form-control" type="email" name="email">
  </td>

  <td><!--密碼-->
    <input class="form-control" type="password" name="password">
  </td>

  <td><!--職稱-->
    <input class="form-control" type="text" name="title" autofocus>
  </td>

  <td><!--專長-->
    <input class="form-control" type="text" name="skills">
  </td>

  <td><!--所屬系別-->
    <select class="form-control" name="unit_id">
      @foreach ($general->units as $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endforeach
    </select>
  </td>

  <td colspan="2">
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
