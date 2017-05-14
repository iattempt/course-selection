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
  <tr>
    @if ($general->info->name === 'admin')
    @include ('authority/modify/unit/edit', array('caller' => 'unit'))
    @include ('authority/modify/unit/delete', array('caller' => 'unit'))
    @else
    @include ('authority/modify/unit/contain', array('caller' => 'user'))
    @endif
  </tr>
  @endforeach
</tbody>
@endsection
