<td>
  {{ csrf_field() }}
  <input name="_method" type="hidden" value="PUT">
  <a id="edit_{{$list->id}}" onclick="enableEdit(this)" href="javascript:void(0)" class="btn btn-primary">修改</a>
  <input class="btn btn-primary" type="submit" value="送出" hidden>
</td>
