<td><!--代號-->
  {{ $list->id }}
</td>

<td><!--名稱-->
  <select class="edit_{{ $list->id }} form-control" name="course_id" disabled>
    @foreach ($general->course as $value)
      @if ($value->id === $list->course_id)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>

<td><!--單位-->
  <select class="edit_{{ $list->id }} form-control" name="unit_id" disabled>
    @foreach ($general->unit as $value)
      @if ($value->id === $list->unit_id)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>

<td><!--修別-->
  <select class="edit_{{ $list->id }} form-control" name="type_id" disabled>
    @foreach ($general->type as $value)
      @if ($value->id === $list->type_id)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>
