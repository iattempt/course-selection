<td>
  {{$list->id}}
</td>
<td>
  <input class="edit_{{$list->id}} form-control" name="name" value="{{$list->name}}" readonly>
</td>
<td>
  <select class="edit_{{ $list->id }} form-control" name="unit_base_id" disabled>
    @foreach ($general->lists as $value)
      @if ($value->id === $list->unit_base_id)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>
