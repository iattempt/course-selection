<form action="" method="POST">
  {{ csrf_field() }}
  <td><!---->
    Auto
  </td>

  <td><!--單位-->
    <select class="form-control" name="unit_id">
      @foreach ($general->units as $u)
      <option value="{{$u->id}}">{{$u->name}}</option>
      @endforeach
    </select>
  </td>

  <td><!--修別-->
    <select class="form-control" name="type_id">
      @foreach ($general->types as $t)
      <option value="{{$t->id}}">{{$t->name}}</option>
      @endforeach
    </select>
  </td>

  <td><!--課程基底-->
    <select class="form-control" name="course_base_id">
      @foreach ($general->course_bases as $cb)
      <option value="{{$cb->id}}">{{$cb->name}}</option>
      @endforeach
    </select>
  </td>

  <td><!--適用學年度-->
    <select class="form-control" name="adopt_year">
      @for ($y=2016; $y<=date('Y'); $y++)
        <option value="{{$y}}" {{env('CURRENT_YEAR')==$y ? 'selected': ''}}>{{$y}}</option>
      @endfor
    </select>
  </td>

  <td><!--預定年級-->
    <select class="form-control" name="adopt_grade">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="5">4</option>
      <option value="5">5</option>
    </select>
  </td>

  <td><!--預定學期-->
    <select class="form-control" name="adopt_semester">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </td>
  <td colspan="2"><!---->
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
