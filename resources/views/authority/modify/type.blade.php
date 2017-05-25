@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>修別代號</th>
    <th>修別名稱</th>
    <th>修別種類</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/type/create', array('caller' => 'type'))
  </tr>
  @foreach ($general->lists as $list)
    @if ($list->id !== 2)
  <tr>
    @include ('authority/modify/type/edit', array('caller' => 'type'))
    @include ('authority/modify/type/delete', array('caller' => 'type'))
  </tr>
    @endif
  @endforeach
</tbody>
@endsection
