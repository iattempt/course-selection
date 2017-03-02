@extends('schema/head')
@section('main')
@parent
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ $home }}">選課系統</a>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">課程搜尋</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">修改</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">行政人員/教授</a>
            <a class="dropdown-item" href="#">學生</a>
            <a class="dropdown-item" href="#">課程</a>
            <a class="dropdown-item" href="#">單位</a>
            <a class="dropdown-item" href="#">畢業門檻</a>
            <a class="dropdown-item" href="#">學期課程</a>
            <a class="dropdown-item" href="#">課程大綱</a>
            <a class="dropdown-item" href="#">教室</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">意見回饋</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">登入</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">登出</a>
        </li>
      </ul>
      <span class="navbar-text">
        Navbar text with an inline element
      </span>
    </div>
  </nav>
@endsection
