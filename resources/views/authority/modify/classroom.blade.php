@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>教室代號</th>
    <th>教室名稱</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/crud/create', array('caller' => 'classroom'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @if ($general->info->name === 'admin')
    @include ('authority/modify/crud/edit', array('caller' => 'classroom'))
    @include ('authority/modify/crud/delete', array('caller' => 'classroom'))
    @else
    @include ('authority/modify/crud/contain', array('caller' => 'user'))
    @endif
  </tr>
  @endforeach
</tbody>
@endsection
