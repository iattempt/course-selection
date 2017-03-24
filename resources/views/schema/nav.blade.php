@extends('schema/header')
@section('main-nav')
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary row">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/index">選課系統</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @section('nav')
      @show
    </ul>
    <div class="btn-group">
      <a class="btn btn-secondary dropdown-toggle text-primary" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        其他
      </a>
      <div class="dropdown-menu">
        <a class="nav-link text-primary" href="http://www.thu.edu.tw/web/calendar/detail.php?scid=23&sid=36">行事曆</a>
        <hr>
        <a class="nav-link text-primary" href="/feedback">意見回饋</a>
      </div>
    </div>
    <div></div>
    <a class="btn btn-secondary text-primary mx-lg-1 my-lg-0 my-1" href="/sign_out">登出</a>
  </div>
</nav>
@endsection
