@extends('authority/modify')
@section('modify')
<div class="container">
  @include ('authority/modify/course/create')

  <table class="table table-striped">
    <thead>
      <tr>
        <th>代號</th>
        <th>名稱</th>
        <th>基底</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($general->lists as $list)
      <tr>
        <td>$list->id</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection
