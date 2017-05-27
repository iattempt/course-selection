@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>課程代號</th>
    <th>課程基底名稱</th>
    <th>學分</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/course_base/create', array('caller' => 'course_base'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/course_base/edit', array('caller' => 'course_base'))
    @include ('authority/modify/course_base/delete', array('caller' => 'course_base'))
  </tr>
  @endforeach
</tbody>
@endsection
