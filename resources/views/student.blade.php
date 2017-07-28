@extends('schema/preset')

@section('nav')
<li class="nav-item">
  <a id="home" class="nav-link highlight-nav" href="/student">首頁</a>
</li>
<li class="nav-item">
  <a class="nav-link highlight-nav" href="/student/state/curriculum">課表</a>
</li>
<li class="nav-item">
  <a class="nav-link highlight-nav" href="/student/state/threshold">修課概覽</a>
</li>
<li class="nav-item">
  <a class="nav-link highlight-nav" href="/course_search">加選</a>
</li>
<li class="nav-item">
  <a class="nav-link highlight-nav" href="/student/selection/drop">退選</a>
</li>
@endsection

@section ('main')
@yield ('student')
@endsection
