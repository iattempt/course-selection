<form id="collapseEdit" class="collapse" action="{{ $caller }}/{{$list->id}}" method="POST" onsubmit="return confirm('您確定要送出表單嗎?');">
  {{ csrf_field() }}
  @include ('authority/modify/course_professor/contain', array('caller' => '{{ $caller}}'))

  <td>
    {{ method_field('PUT') }}
    <a id="edit_{{$list->id}}" onclick="enableEdit(this)" href="javascript:void(0)" class="btn btn-primary">修改</a>
    <input class="btn btn-success" type="submit" value="送出" hidden>
  </td>
</form>
