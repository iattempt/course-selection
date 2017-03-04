@extends('schema/preset')
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
          <a class="nav-link" href="#">修課概覽</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">課程搜尋
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">選課</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">加選</a>
            <a class="dropdown-item" href="#">退選</a>
            <a class="dropdown-item" href="#">特殊加選</a>
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
