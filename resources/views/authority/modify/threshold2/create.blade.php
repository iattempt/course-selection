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

  <td><!--所需學分-->
    <select class="form-control" name="credit">
      @for ($i = 1; $i<100; $i++)
        <option value="{{$i}}">{{$i}}</option>
      @endfor
    </select>
  </td>

  <td><!--適用學年度-->
    <select class="form-control" name="adopt_year">
      @for ($y=2016; $y<=date('Y'); $y++)
        <option value="{{$y}}" {{env('CURRENT_YEAR')==$y ? 'selected': ''}}>{{$y}}</option>
      @endfor
    </select>
  </td>

  <td colspan="2"><!---->
    <input class="btn btn-success" type="submit" value="新增">
  </td>
</form>
