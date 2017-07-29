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
    <a class="dropdown-item" href="/authority/modify/professor">教授</a>
    <a class="dropdown-item" href="/authority/modify/student">學生</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="/authority/modify/unit">單位</a>
    <a class="dropdown-item" href="/authority/modify/type">修別</a>

    <div class="dropdown-divider"></div>
    <div class="dropdown-item">課程 -</div>
      <a class="col-10 offset-2 dropdown-item" href="/authority/modify/course_base">基底</a>
      <a class="col-10 offset-2 dropdown-item" href="/authority/modify/course">基本資料</a>
      <a class="col-10 offset-2 dropdown-item" href="/authority/modify/course_professor">教師</a>
      <a class="col-10 offset-2 dropdown-item" href="/authority/modify/course_time">時段</a>
      <a class="col-10 offset-2 dropdown-item" href="/authority/modify/course_type">修別</a>

    <div class="dropdown-divider"></div>
    <div class="dropdown-item">畢業門檻 -</div>
      <a class="col-10 offset-2 dropdown-item" href="/authority/modify/threshold1">必修/必選修</a>
      <a class="col-10 offset-2 dropdown-item" href="/authority/modify/threshold2">選修/通識</a>

    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="/authority/modify/export_sql">備份並下載SQL</a>
  </div>
</li>
@endsection

@section ('main')
@yield ('authority')
@endsection
