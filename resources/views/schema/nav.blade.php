@extends('schema/header')
@section('main-nav')
<div class="container-fluid">
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary row">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto" href="/index">選課系統</a>
    <div class="collapse navbar-collapse show" id="navbarSupportedContent">
      <hr class="bg-faded d-lg-none">
      <ul class="navbar-nav mr-auto">
        @section('nav')
        @show
      </ul>
    <div class="btn-group">
      <a class="btn btn-secondary dropdown-toggle text-primary" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        其他
      </a>
      <div class="dropdown-menu">
        <a class="nav-link text-primary" href="{{$G_SCHOOL_WEBSITE}}">{{$G_SCHOOL}}首頁</a>
        <a class="nav-link text-primary" href="{{$G_SCHOOL_CALANDER}}">行事曆</a>
        <a class="nav-link text-primary" href="/feedback">意見回饋</a>
        <a class="nav-link text-primary" href="/sign_out">登出</a>
      </div>
    </div>
    </div>
  </nav>
</div>
@endsection
