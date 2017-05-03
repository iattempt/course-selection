<td>
  {{$list->id}}
</td>
<td>
  <input type="text" class="edit_{{$list->id}}" name="name" value="{{$list->name}}" readonly>
</td>
<td>
  <input type="email" class="edit_{{$list->id}}" name="email" value="{{$list->email}}" readonly>
</td>
<td>
  <input type="password" class="edit_{{$list->id}}" name="password" placeholder="********" readonly>
</td>
<td>
  <input type="text" class="edit_{{$list->id}}" name="type" value="{{$list->type}}" readonly>
</td>
