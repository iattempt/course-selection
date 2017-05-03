<form action="" method="POST">
  {{ csrf_field() }}
  <td>
    Auto
  </td>
  <td>
    <select class="form-control" name="unit_id">
      @foreach ($general->units as $u)
      <option value="{{$u->id}}">{{$u->name}}</option>
      @endforeach
    </select>
  </td>
  <td>
    <select class="form-control" name="type_id">
      @foreach ($general->types as $t)
      <option value="{{$t->id}}">{{$t->name}}</option>
      @endforeach
    </select>
  </td>
  <td>
    <select class="form-control" name="course_base_id">
      @foreach ($general->course_bases as $cb)
      <option value="{{$cb->id}}">{{$cb->name}}</option>
      @endforeach
    </select>
  </td>
  <td>
    <select class="form-control" name="adopt_year">
      <option value="2017">2017</option>
      <option value="2016">2016</option>
    </select>
  </td>
  <td>
    <select class="form-control" name="default_grade">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="5">4</option>
      <option value="5">5</option>
    </select>
  </td>
  <td>
    <select class="form-control" name="default_semester">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </td>
  <td colspan="2">
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
