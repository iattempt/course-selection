  <td><!---->
    {{$list->id}}
  </td>

  <td><!--單位-->
    <select class="form-control edit_{{$list->id}}" name="unit_id" disabled>
      @foreach ($general->units as $u)
        @if ($u->id == $list->unit_id)
          <option value="{{$u->id}}" selected>{{$u->name}}</option>
        @else
          <option value="{{$u->id}}">{{$u->name}}</option>
        @endif
      @endforeach
    </select>
  </td>

  <td><!--修別-->
    <select class="form-control edit_{{$list->id}}" name="type_id" disabled>
      @foreach ($general->types as $t)
        @if ($t->id == $list->type_id)
          <option value="{{$t->id}}" selected>{{$t->name}}</option>
        @else
          <option value="{{$t->id}}">{{$t->name}}</option>
        @endif
      @endforeach
    </select>
  </td>

  <td><!--所需學分-->
    <select class="form-control edit_{{$list->id}}" name="credit" disabled>
      @for ($i=1; $i<100; $i++)
        <option value="{{$i}}" {{$list->credit == $i ? 'selected' : ''}}>{{$i}}</option>
      @endfor
    </select>
  </td>

  <td><!--適用學年度-->
    <select class="form-control edit_{{$list->id}}" name="adopt_year" disabled>
      <option value="2017" {{$list->adopt_year == '2017' ? 'selected':''}}>2017</option>
      <option value="2016" {{$list->adopt_year == '2016' ? 'selected':''}}>2016</option>
    </select>
  </td>
