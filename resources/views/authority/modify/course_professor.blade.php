@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>課程代號</th>
    <th>課程名稱</th>
    <th>教師</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/course_professor/create', array('caller' => 'course_professor'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/course_professor/edit', array('caller' => 'course_professor'))
    @include ('authority/modify/course_professor/delete', array('caller' => 'course_professor'))
  </tr>
  @endforeach
</tbody>
@endsection
