@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>人員代號</th>
    <th>人員名稱</th>
    <th>電子郵件</th>
    <th>密碼</th>
    <th>入學年度</th>
    <th>學籍狀態</th>
    <th>所屬系級</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/student/create', array('caller' => 'student'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @if ($general->info->name === 'admin')
    @include ('authority/modify/student/edit', array('caller' => 'student'))
    @include ('authority/modify/student/delete', array('caller' => 'student'))
    @else
    @include ('authority/modify/student/contain', array('caller' => 'student'))
    @endif
  </tr>
  @endforeach
</tbody>
@endsection
