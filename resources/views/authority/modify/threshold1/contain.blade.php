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

  <td><!--課程基底-->
    <select class="form-control edit_{{$list->id}}" name="course_base_id" disabled>
      @foreach ($general->course_bases as $cb)
        @if ($cb->id == $list->course_base_id)
          <option value="{{$cb->id}}" selected>{{$cb->name}}</option>
        @else
          <option value="{{$cb->id}}">{{$cb->name}}</option>
        @endif
      @endforeach
    </select>
  </td>

  <td><!--適用學年度-->
    <select class="form-control edit_{{$list->id}}" name="adopt_year" disabled>
      <option value="2017" {{$list->adopt_year == '2017' ? 'selected':''}}>2017</option>
      <option value="2016" {{$list->adopt_year == '2016' ? 'selected':''}}>2016</option>
    </select>
  </td>

  <td><!--預設年級-->
    <select class="form-control edit_{{$list->id}}" name="default_grade" disabled>
      <option value="1" {{$list->default_grade == 1 ? 'selected' : ''}}>1</option>
      <option value="2" {{$list->default_grade == 2 ? 'selected' : ''}}>2</option>
      <option value="3" {{$list->default_grade == 3 ? 'selected' : ''}}>3</option>
      <option value="4" {{$list->default_grade == 4 ? 'selected' : ''}}>4</option>
      <option value="5" {{$list->default_grade == 5 ? 'selected' : ''}}>5</option>
    </select>
  </td>

  <td><!--預設學期-->
    <select class="form-control edit_{{$list->id}}" name="default_semester" disabled>
      <option value="1" {{$list->default_semester == '1' ? 'selected' : ''}}>1</option>
      <option value="2" {{$list->default_semester == '2' ? 'selected' : ''}}>2</option>
    </select>           
  </td>                 
                        
