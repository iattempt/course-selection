@extends('schema/header')
@section('main-nav')

<div class="container-fluid">
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary row">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto" href="/">選課系統</a>
    <div class="collapse navbar-collapse show" id="navbarSupportedContent">
      <hr class="bg-faded d-lg-none">
      <ul id="nav" class="navbar-nav mr-auto">
        @section('nav')
        @show
        <li class="dropdown nav-item">
          <a class="nav-link dropdown-toggle" id="dropdownElse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            其他
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownElse">
            <a class="dropdown-item" href="{{ $general->school->website }}">{{ $general->school->name }}首頁</a>
            <a class="dropdown-item" href="{{ $general->school->calender }}">行事曆</a>
            <a class="dropdown-item" href="/feedback">意見回饋</a>
        </li>
      </ul>
      <a class="btn btn-primary" href="/sign_out">登出</a>
    </div>
  </nav>
</div>

@endsection
