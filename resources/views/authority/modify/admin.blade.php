@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>人員代號</th>
    <th>人員名稱</th>
    <th>電子郵件</th>
    <th>密碼</th>
    <th>身份</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/admin/create', array('caller' => 'admin'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/admin/edit', array('caller' => 'admin'))
    @include ('authority/modify/admin/delete', array('caller' => 'admin'))
  </tr>
  @endforeach
</tbody>
@endsection
