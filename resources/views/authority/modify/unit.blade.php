@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>單位代號</th>
    <th>單位名稱</th>
    <th>隸屬單位</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/unit/create', array('caller' => 'unit'))
  </tr>
  @foreach ($general->lists as $list)
    @if ($list->id !== 1)
  <tr>
    @include ('authority/modify/unit/edit', array('caller' => 'unit'))
    @include ('authority/modify/unit/delete', array('caller' => 'unit'))
  </tr>
    @endif
  @endforeach
</tbody>
@endsection
