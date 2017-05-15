<td>
  {{$list->id}}
</td>
<td>
  <input type="text" class="form-control edit_{{$list->id}}" name="name" value="{{$list->name}}" readonly>
</td>
<td>
  <input type="email" class="form-control edit_{{$list->id}}" name="email" value="{{$list->email}}" readonly>
</td>
<td>
  <input type="password" class="form-control edit_{{$list->id}}" name="password" placeholder="********" readonly>
</td>
<td>
  <input type="text" class="form-control edit_{{$list->id}}" name="year" value="{{$list->student->year}}" readonly>
</td>
<td>
  <input type="text" class="form-control edit_{{$list->id}}" name="state" value="{{$list->student->state}}" readonly>
</td>
<td>
  <select class="form-control edit_{{ $list->id }}" name="unit_id" disabled>
    @foreach ($general->units as $value)
      @if ($value->name === $list->student->unit->name)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>
