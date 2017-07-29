<td>
  <form action="{{ $caller }}/{{$list->id}}" method="POST" onsubmit="return confirm('您確定要送出表單嗎?');">
    {{ csrf_field() }}
    {{ method_field('DELETE')}}
    <input class="btn btn-danger" type="submit" value="刪除">
  </form>
</td>
