@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>課程代號</th>
    <th>課程名稱</th>
    <th>課程基底</th>
    <th>教授</th>
    <th>單位</th>
    <th>教室</th>
    <th>時段</th>
    <th>修別</th>
    <th>簡述</th>
    <th>學分</th>
    <th>授課語言</th>
    <th>MOOCs</th>
    <th>學年度</th>
    <th>學期</th>
    <th>現修人數</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/course/create', array('caller' => 'course'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/course/edit', array('caller' => 'course'))
    @include ('authority/modify/course/delete', array('caller' => 'course'))
  </tr>
  @endforeach
</tbody>
@endsection
