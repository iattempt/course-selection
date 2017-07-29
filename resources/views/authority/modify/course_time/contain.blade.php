  <td><!---->
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

  <td><!--星期-->
    <select class="edit_{{ $list->id }} form-control" name="day_id" disabled>
      @foreach ($general->day as $value)
        @if ($value->id === $list->day_id)
          <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
        @else
          <option value="{{ $value->id }}">{{ $value->name }}</option>
        @endif
      @endforeach
    </select>
  </td>

  <td><!--時段-->
    <select class="edit_{{ $list->id }} form-control" name="period_id" disabled>
      @foreach ($general->period as $value)
        @if ($value->id === $list->period_id)
          <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
        @else
          <option value="{{ $value->id }}">{{ $value->name }}</option>
        @endif
      @endforeach
    </select>
  </td>
