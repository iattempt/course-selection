<form action="" method="POST">
  {{ csrf_field() }}
  <td>
    Auto
  </td>
  <td>
    <input type="text" class="form-control" name="name">
  </td>
  <td>
    <select class="form-control" name="course_base_id">
      @foreach ($general->course_bases as $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </td>
  <td>
    <select class="form-control" name="unit_id">
      @foreach ($general->units as $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </td>
  <td>
    <select class="form-control" name="classroom_id">
      @foreach ($general->classrooms as $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
      @endforeach
    </select>
  </td>
  <td>
    <input type="text" class="form-control" name="topic" value="">
  </td>
  <td>
    <select class="form-control" name="credit">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
  </td>
  <td>
    <select class="form-control" name="language">
      <option value="英文">英文</option>
      <option value="中文">中文</option>
    </select>
  </td>
  <td>
    <select class="form-control" name="mooc">
      <option value="0">0</option>
      <option value="1">1</option>
    </select>
  </td>
  <td>
    <select class="form-control" name="year">
      <option value="2017">2017</option>
      <option value="2016">2016</option>
    </select>
  </td>
  <td>
    <select class="form-control" name="semester">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </td>
  <td>
    <select class="form-control" name="enrollment_max">
      @for ($i=0; $i<100; $i++)
        <option value="{{$i}}">{{$i}}</option>
      @endfor
    </select>
  </td>
  <td colspan="2">
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
