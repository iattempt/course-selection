<form id="collapseEdit" class="collapse" action="{{ $caller }}/{{$list->id}}" method="POST">
  {{ csrf_field() }}
  @include ('authority/modify/threshold/contain', array('caller' => '{{ $caller}}'))

  <td>
    <input name="_method" type="hidden" value="PUT">
    <a id="edit_{{$list->id}}" onclick="enableEdit(this)" href="javascript:void(0)" class="btn btn-primary">修改</a>
    <input class="btn btn-success" type="submit" value="送出" hidden>
  </td>
</form>
