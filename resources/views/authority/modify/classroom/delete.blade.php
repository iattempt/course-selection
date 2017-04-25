<form action="classroom/{{$list->id}}" method="POST">
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="DELETE">
  <input class="btn btn-primary" type="submit" value="刪除">
</form>
