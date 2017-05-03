@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>單位代號</th>
    <th>單位名稱</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/crud/create', array('caller' => 'unit'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/crud/edit', array('caller' => 'unit'))
    @include ('authority/modify/crud/delete', array('caller' => 'unit'))
  </tr>
  @endforeach
</tbody>
@endsection
