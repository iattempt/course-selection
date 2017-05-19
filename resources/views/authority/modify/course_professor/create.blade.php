<form action="" method="POST">
  {{ csrf_field() }}
  <td><!--代號-->
    Auto
  </td>

  <td><!--名稱-->
    <select class="form-control" name="course_id">
      @foreach ($general->course as $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endforeach
    </select>
  </td>

  <td><!--教授-->
    <select class="form-control" name="user_id">
      @foreach ($general->professor as $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endforeach
    </select>
  </td>

  <td colspan="2"><!---->
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
