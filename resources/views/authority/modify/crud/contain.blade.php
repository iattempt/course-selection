<form id="collapseEdit" class="collapse" action="classroom/{{$list->id}}" method="POST">
  <td>
    {{$list->id}}
  </td>
  <td>
    <input class="edit_{{$list->id}}" name="name" value="{{$list->name}}" readonly>
  </td>
  @include ('authority/modify/crud/show', array('show' => 'classroom'))
  @include ('authority/modify/crud/edit', array('edit' => 'classroom'))
</form>
