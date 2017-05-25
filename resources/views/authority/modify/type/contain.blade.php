  <td><!---->
    {{$list->id}}
  </td>

  <td><!--修別名稱-->
    <input class="edit_{{$list->id}} form-control" name="name" value="{{$list->name}}" readonly>
  </td>

  <td><!--修別種類-->
    <select class="edit_{{ $list->id }} form-control" name="type_base_id" disabled>
      @foreach ($general->lists as $value)
        @if ($value->id === $list->type_base_id)
          <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
        @else
          <option value="{{ $value->id }}">{{ $value->name }}</option>
        @endif
      @endforeach
    </select>
  </td>
