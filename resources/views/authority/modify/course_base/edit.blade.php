<form id="collapseEdit" class="collapse" action="../{{$id}}" method="POST">
  {{ csrf_field() }}
  <input name="_method" type="hidden" value="PUT">
  <input type="submit" value="修改">
</form>
