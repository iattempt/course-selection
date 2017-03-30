@extends('schema/preset')
@section('nav')

<li class="nav-item">
  <a class="nav-link" href="/student">首頁</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/student/threshold">修課概覽</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/student/syllabus">課表</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/student/pre_syllabus">預選課表</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/student/course_search">課程搜尋</a>
</li>
<li class="dropdown nav-item">
  <a class="nav-link dropdown-toggle" id="dropdownModify" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    修改
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownModify">
    <a class="dropdown-item" href="/student/selection/enroll/recommendation">推薦課程</a>
    <a class="dropdown-item" href="/student/selection/enroll/in_required">必修</a>
    <a class="dropdown-item" href="/student/selection/enroll/common_required">共必修</a>
    <a class="dropdown-item" href="/student/selection/enroll/in_force_elective">系必選</a>
    <a class="dropdown-item" href="/student/selection/enroll/in_elective">系選</a>
    <a class="dropdown-item" href="/student/selection/enroll/elective">選修</a>
    <a class="dropdown-item" href="/student/selection/enroll/general">通識</a>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link" href="/student/selection/drop">退選</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/student/selection/apply_for">特殊加選</a>
</li>

@endsection

@section('main')

@section('student')
@show

@endsection
