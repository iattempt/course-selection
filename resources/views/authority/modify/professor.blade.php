@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>人員代號</th>
    <th>人員名稱</th>
    <th>電子郵件</th>
    <th>密碼</th>
    <th>職稱</th>
    <th>專長</th>
    <th>隸屬單位</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/professor/create', array('caller' => 'professor'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/professor/edit', array('caller' => 'professor'))
    @include ('authority/modify/professor/delete', array('caller' => 'professor'))
  </tr>
  @endforeach
</tbody>
@endsection
