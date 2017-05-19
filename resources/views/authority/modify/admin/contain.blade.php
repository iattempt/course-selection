<td>
  {{$list->id}}
</td>
<td>
  <input type="text" class="edit_{{$list->id}} form-control" name="name" value="{{$list->name}}" readonly>
</td>
<td>
  <input type="email" class="edit_{{$list->id}} form-control" name="email" value="{{$list->email}}" readonly>
</td>
<td>
  <input type="password" class="edit_{{$list->id}} form-control" name="password" placeholder="********" readonly>
</td>
