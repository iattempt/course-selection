  <td><!---->
    {{$list->id}}
  </td>

  <td><!--名字-->
    <input class="edit_{{$list->id}} form-control" name="name" value="{{$list->name}}" readonly>
  </td>

  <td><!--學分-->
    <select class="edit_{{ $list->id }} form-control" name="credit" disabled>
      <option value="0" {{ ($list->credit == '0' ? 'selected' : '') }}>0</option>
      <option value="1" {{ ($list->credit == '1' ? 'selected' : '') }}>1</option>
      <option value="2" {{ ($list->credit == '2' ? 'selected' : '') }}>2</option>
      <option value="3" {{ ($list->credit == '3' ? 'selected' : '') }}>3</option>
    </select>
  </td>
