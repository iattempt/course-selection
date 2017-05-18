@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>課程代號</th>
    <th>課程名稱</th>
    <th>星期</th>
    <th>時段</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/course_time/create', array('caller' => 'course_time'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/course_time/edit', array('caller' => 'course_time'))
    @include ('authority/modify/course_time/delete', array('caller' => 'course_time'))
  </tr>
  @endforeach
</tbody>
@endsection
