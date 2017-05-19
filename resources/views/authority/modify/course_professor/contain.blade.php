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

<td><!--教授-->
  <select class="edit_{{ $list->id }} form-control" name="user_id" disabled>
    @foreach ($general->professor as $value)
      @if ($value->id === $list->user_id)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>
