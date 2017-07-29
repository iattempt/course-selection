@extends('schema/head')
@section('header')

<div class="container-fluid">
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary row">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto mx-lg-3" href="/">選課系統</a>
    <div class="collapse navbar-collapse mx-3" id="navbarSupportedContent">
      <hr class="bg-faded d-lg-none">
      <ul class="navbar-nav mr-auto">
        @section('nav')
        @show
        @if ($general->identity !== "")
        <li class="dropdown nav-item">
          <a class="nav-link dropdown-toggle" role="button" id="dropdownNavElse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            其他
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownNavElse">
            <a class="dropdown-item" href="{{ $general->school->website }}">{{ $general->school->name }}首頁</a>
            <a class="dropdown-item" href="{{ $general->school->calender }}">行事曆</a>
          </div>
        </li>
        @endif
      </ul>
      <div class="btn">目前登入IP:{{$general->ip}}</div>
      @if ($general->identity !== "")
      <a class="btn btn-success" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
      @endif
    </div>
  </nav>
</div>

<script>
//append classname:active to nav

(function() {
  anchor = document.querySelectorAll('.nav-link,.dropdown-item');
  current = "http://iattempt.net" + window.location.pathname;
  for (var i = 0; i < anchor.length; i++) {
    if (anchor[i].href == current || anchor[i].href + "/" == current) {
      anchor[i].className += " active";
      //if node is dropdown item then dropdown menu's name is also set active
      for (var j = 0; j < anchor[i].classList.length; j++)
        if (anchor[i].classList[j] =="dropdown-item")
          anchor[i].parentElement.parentElement.className += " active";
    }
  }
})();
</script>

@endsection
