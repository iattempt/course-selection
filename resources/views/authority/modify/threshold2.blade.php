@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>門檻代號</th>
    <th>單位名稱</th>
    <th>修別名稱</th>
    <th>所需學分</th>
    <th>適用學年度</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/threshold2/create', array('caller' => 'threshold2'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/threshold2/edit', array('caller' => 'threshold2'))
    @include ('authority/modify/threshold2/delete', array('caller' => 'threshold2'))
  </tr>
  @endforeach
</tbody>
@endsection
