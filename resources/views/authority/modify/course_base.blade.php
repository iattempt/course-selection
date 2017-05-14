@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>課程代號</th>
    <th>課程基底名稱</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/crud/create', array('caller' => 'course_base'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @if ($general->info->name === 'admin')
    @include ('authority/modify/crud/edit', array('caller' => 'course_base'))
    @include ('authority/modify/crud/delete', array('caller' => 'course_base'))
    @else
    @include ('authority/modify/crud/contain', array('caller' => 'user'))
    @endif
  </tr>
  @endforeach
</tbody>
@endsection
