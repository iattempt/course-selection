<form action="" method="POST">
  {{ csrf_field() }}
  <td><!--代號-->
    Auto
  </td>

  <td><!--名稱-->
    <input type="text" class="form-control" name="name">
  </td>

  <td><!--基底代號-->
    <select class="form-control" name="course_base_id">
      @foreach ($general->course_bases as $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </td>

  <td><!--單位-->
    <select class="form-control" name="unit_id">
      @foreach ($general->units as $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </td>

  <td><!--教室-->
    <select class="form-control" name="classroom_id">
      @foreach ($general->classrooms as $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </td>

  <td><!--授課語言-->
    <select class="form-control" name="language">
      <option value="英文">英文</option>
      <option value="中文" selected>中文</option>
    </select>
  </td>

  <td><!--學年度-->
    <select class="form-control" name="year">
      @for ($y=2016; $y<=date('Y'); $y++)
        <option value="{{$y}}" {{env('CURRENT_YEAR') == $y ? 'selected': ''}}>{{$y}}</option>
      @endfor
    </select>
  </td>

  <td><!--學期-->
    <select class="form-control" name="semester">
      <option value="1" {{env('CURRENT_SEMESTER') == '1' ? 'selected': ''}}>1</option>
      <option value="2" {{env('CURRENT_SEMESTER') == '2' ? 'selected': ''}}>2</option>
    </select>
  </td>

  <td><!--限修人數-->
    <select class="form-control" name="enrollment_max">
      @for ($i=30; $i<100; $i++)
        <option value="{{$i}}">{{$i}}</option>
      @endfor
    </select>
  </td>

  <td colspan="2"><!---->
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
