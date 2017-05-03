@extends ('authority/modify')

@section ('modify')
<thead>
  <tr>
    <th>門檻代號</th>
    <th>單位名稱</th>
    <th>修別名稱</th>
    <th>課程基底名稱</th>
    <th>適用學年度</th>
    <th>開課年級</th>
    <th>開課學期</th>
    <th colspan="3">異動</th>
  </tr>
</thead>
<tbody>
  <tr>
    @include ('authority/modify/threshold/create', array('caller' => 'threshold'))
  </tr>
  @foreach ($general->lists as $list)
  <tr>
    @include ('authority/modify/threshold/edit', array('caller' => 'threshold'))
    @include ('authority/modify/threshold/delete', array('caller' => 'threshold'))
  </tr>
  @endforeach
</tbody>
@endsection
