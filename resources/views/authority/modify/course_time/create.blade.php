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

  <td><!--星期-->
    <select class="form-control" name="day_id">
      @foreach ($general->day as $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endforeach
    </select>
  </td>

  <td><!--時段-->
    <select class="form-control" name="period_id">
      @foreach ($general->period as $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endforeach
    </select>
  </td>

  <td colspan="2"><!---->
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
