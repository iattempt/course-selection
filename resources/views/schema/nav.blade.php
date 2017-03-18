@extends('schema/header')
@section('main-nav')
<nav class="navbar navbar-inverse bg-inverse container-fluid">
  <div class="row">
    <div class="col-2">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="col-8">
      @section('nav')
      @show
    </div>
    <div class="col-2 justify-content-end">
      <a class="btn btn-info" href="sign_out">登出</a>
    </div>
  </div>
  <div class="container-fluid">
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="bg-inverse">
        <a class="navbar-brand" href="{{$G_SCHOOL_WEBSITE}}">{{$G_SCHOOL}}</a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="http://www.thu.edu.tw/web/calendar/detail.php?scid=23&sid=36">行事曆</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">意見回饋</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
@section('main')
@show
@endsection
