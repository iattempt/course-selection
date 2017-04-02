@extends('schema/head')
@section('header')

<div class="container-fluid sticky-top">
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary row">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto mx-lg-3" href="/">選課系統</a>
    <div class="collapse navbar-collapse show mx-3" id="navbarSupportedContent">
      <hr class="bg-faded d-lg-none">
      <ul class="navbar-nav mr-auto">
        @section('nav')
        @show
        @if ($general->identity !== "")
        <li class="dropdown nav-item">
          <a class="nav-link dropdown-toggle" id="dropdownElse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            其他
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownElse">
            <a class="dropdown-item" href="{{ $general->school->website }}">{{ $general->school->name }}首頁</a>
            <a class="dropdown-item" href="{{ $general->school->calender }}">行事曆</a>
            <a class="dropdown-item" href="/feedback">意見回饋</a>
        </li>
        @endif
      </ul>
      @if ($general->identity !== "")
      <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        登出
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
      @endif
    </div>
  </nav>
</div>

@endsection
