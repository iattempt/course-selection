@extends('schema/header')
@section('main-nav')
<nav class="navbar navbar-inverse bg-inverse container">
  <div class="row">
    <div class="col-4 justify-content-start">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top-nav" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="col-6 row">
      @section('nav')
      @show
    </div>
    <div class="col-2 d-flex justify-content-end">
      <a class="btn btn-info" href="sign_out">登出</a>
    </div>
  </div>
  <div class="collapse" id="top-nav">
    <div class="bg-inverse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{$G_SCHOOL_WEBSITE}}">{{$G_SCHOOL}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://www.thu.edu.tw/web/calendar/detail.php?scid=23&sid=36">行事曆</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/feedback">意見回饋</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div id="content">
</div>
@endsection
