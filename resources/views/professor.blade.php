@extends('schema/preset')
@section('main')
@parent
@endsection
@section('nav')
<ul class="nav nav-tabs justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="/professor">首頁</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/professor/approve">審核特殊加選</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/professor/my_course">我的課程</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/professor/unit_course">系上課程</a>
  </li>
</ul>
@endsection

