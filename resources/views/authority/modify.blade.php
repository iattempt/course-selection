@extends ('authority')

@section ('authority')
<div class="container-fluid">
  <div class="row mx-3">
    <table class="col-12 table-striped table-bordered">
@section('modify')
@show

    </table>
  </div>
</div>

<script>
function enableEdit(who)
{
  //change button 修改->送出
  who.setAttribute('hidden', 'true');
  who.nextElementSibling.removeAttribute('hidden');

  var contains = document.getElementsByClassName(who.id);
  for (var i = 0, l = contains.length; i < l; i++) {
    contains[i].removeAttribute('readonly');
    contains[i].removeAttribute('disabled');
  }
}
</script>
@endsection
