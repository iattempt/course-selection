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

  <td><!--單位-->
    <select class="form-control" name="unit_id">
      @foreach ($general->unit as $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endforeach
    </select>
  </td>

  <td><!--修別-->
    <select class="form-control" name="type_id">
      @foreach ($general->type as $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endforeach
    </select>
  </td>

  <td colspan="2"><!---->
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
