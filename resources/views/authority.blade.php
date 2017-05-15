@extends ('schema/preset')

@section ('nav')
<li class="nav-item">
  <a class="nav-link" href="/authority">首頁</a>
</li>
<li class="dropdown nav-item">
  <a class="nav-link dropdown-toggle" role="button" id="dropdownModify" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    修改
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownModify">
    <a class="dropdown-item" href="/authority/modify/admin">行政人員</a>
    <a class="dropdown-item" href="/authority/modify/student">學生</a>
    <a class="dropdown-item" href="/authority/modify/course">課程</a>
    <a class="dropdown-item" href="/authority/modify/course_base">課程基底</a>
    <a class="dropdown-item" href="/authority/modify/unit">單位</a>
    <a class="dropdown-item" href="/authority/modify/threshold">畢業門檻</a>
    <a class="dropdown-item" href="/authority/modify/syllabus">課程大綱</a>
    <a class="dropdown-item" href="/authority/modify/classroom">教室</a>
  </div>
</li>
@endsection

@section ('main')
@yield ('authority')
@endsection
