<td>
  {{$list->id}}
</td>

<td><!--名字-->
  <input type="text" class="form-control edit_{{$list->id}}" name="name" value="{{$list->name}}" readonly>
</td>

<td><!--電子郵件-->
  <input type="email" class="form-control edit_{{$list->id}}" name="email" value="{{$list->email}}" readonly>
</td>

<td><!--密碼-->
  <input type="password" class="form-control edit_{{$list->id}}" name="password" placeholder="********" readonly>
</td>

<td><!--職稱-->
  <input type="text" class="form-control edit_{{$list->id}}" name="title" value="{{$list->professor->title}}" readonly>
</td>

<td><!--專長-->
  <input type="text" class="form-control edit_{{$list->id}}" name="skills" value="{{$list->professor->skills}}" readonly>
</td>

<td><!--所屬系別-->
  <select class="form-control edit_{{ $list->id }}" name="unit_id" disabled>
    @foreach ($general->units as $value)
      @if ($value->name === $list->professor->unit->name)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>
