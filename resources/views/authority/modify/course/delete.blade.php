<td>
  <form action="{{ $caller }}/{{$list->id}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE')}}
    <input class="btn btn-primary" type="submit" value="刪除">
  </form>
</td>
