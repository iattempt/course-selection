@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>課程代號</th>
    <th>課程名稱</th>
    <th>單位</th>
    <th>修別</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/course_type/create', array('caller' => 'course_type'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/course_type/edit', array('caller' => 'course_type'))
    @include ('authority/modify/course_type/delete', array('caller' => 'course_type'))
  </tr>
  @endforeach
</tbody>
@endsection
