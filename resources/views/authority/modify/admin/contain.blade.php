  <td><!---->
    {{$list->id}}
  </td>

  <td><!--admin名字-->
    <input type="text" class="edit_{{$list->id}} form-control" name="name" value="{{$list->name}}" readonly>
  </td>

  <td><!--電子郵件-->
    <input type="email" class="edit_{{$list->id}} form-control" name="email" value="{{$list->email}}" readonly>
  </td>

  <td><!--密碼-->
    <input type="password" class="edit_{{$list->id}} form-control" name="password" placeholder="********" readonly>
  </td>
