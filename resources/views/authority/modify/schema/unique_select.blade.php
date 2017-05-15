<!--
    How to use ?
    include('authority/modify/schema/unique_select', ['list' => $], ['us_name' => $], ['us_compare_name' => $], ['us_foreach_alias' => $])
-->
<td>
  <select class="edit_{{ $list->id }} form-control" name="{{$us_name}}" disabled>
    @foreach ($use_foreach_alias->units as $value)
      @if ($value->us_compare_name === $us_name)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>
