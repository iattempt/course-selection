@extends('schema/preset')
@section('nav')

<li class="nav-item">
  <a class="nav-link active" href="/authority">首頁</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/course_search">課程搜尋</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="">修改</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="../modify/professor">教授</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/authority/modify/student">學生</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/authority/modify/course">課程</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/authority/modify/course_base">課程基底</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/authority/modify/unit">單位</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/authority/modify/threshold">畢業門檻</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/authority/modify/syllabus">課程大綱</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/authority/modify/classroom">教室</a>
</li>

@endsection

@section('main')
@parent
@endsection
