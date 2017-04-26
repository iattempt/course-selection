@extends('authority/modify')
@section('modify')
<div class="container">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>教室代號</th>
        <th>教室名稱</th>
        <th colspan="3">異動</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @include ('authority/modify/crud/create', array('create' => 'classroom'))
      </tr>
      @foreach ($general->lists as $list)
      <tr>
        @include ('authority/modify/crud/contain', array('contain' => 'classroom'))
        @include ('authority/modify/crud/delete', array('delete' => 'classroom'))
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
