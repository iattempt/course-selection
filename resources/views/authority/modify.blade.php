@extends('authority')
@section('authority')
@section('modify')
@show
<script>
function enableEdit(who)
{
  //change button 修改->送出
  who.setAttribute('hidden', 'true');
  who.nextElementSibling.removeAttribute('hidden');

  var contains = document.getElementsByClassName(who.id);
  for (var i = 0, l = contains.length; i < l; i++) {
    contains[i].removeAttribute('readonly');
  }
}
</script>
@endsection
