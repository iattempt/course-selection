@extends('schema/preset')
@section('main')
@parent
@endsection
@section('nav')
<ul class="nav nav-tabs justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="/student">首頁</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/student/state/schedule">修課概覽</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/course_search">課程搜尋</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="">加選</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/student/selection/drop">退選</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/student/selection/apply_for">特殊加選</a>
  </li>
</ul>
@endsection

