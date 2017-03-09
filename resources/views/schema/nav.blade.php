@extends('schema/bootstrap_cdn')
<!DOCTYPE html>
<html lang='zh-tw'>
  <meta charset="utf-8">
  <title>{{ $title }}</title>
  @section('bootstrap_cdn')
    @parent
  @endsection
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</html>
<body class="bd-docs" data-spy="scroll" data-target=".bd-sidenav-active">
  <a id="skippy" class="sr-only sr-only-focusable" href="#content">
    <div class="container">
      <span class="skiplink-text">Skip to main content</span>
    </div>
  </a>
  <div class="pos-f-t container">
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="bg-inverse p-4">
        <h4 class="text-white">Collapsed content</h4>
        <span class="text-muted">Toggleable via the navbar brand.</span>
      </div>
    </div>
    <nav class="navbar navbar-inverse bg-inverse container">
      <div class="row">
        <div class="col-2">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="col-10 container">
          <form class="form-inline row">
            <input class="form-control offset-4 col-4" type="text" placeholder="Search">
            <button class="btn btn-outline-success col-3" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </div>
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <a class="navbar-brand" href="{{$G_SCHOOL_WEBSITE}}">{{$G_SCHOOL}}</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="http://www.thu.edu.tw/web/calendar/detail.php?scid=23&sid=36">行事曆</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign_out">登出</a>
      </li>
    </ul>
  </nav>
  <div class="container">
    <div class="row">
      sdffs
    </div>
  </div>
  @section('main')
  @show
  <div class="clearfix"></div>
  <footer class="text-muted fixed-bottom container">
    <div class="row justify-content-md-cente">
      <p class="col-12 col-auto">
        <em>&copy 2017 Designed and built by Ernest.</em>
        maintained by the
      </p>
      <p class="col-12">
        <a href="https://github.com/iattempt">Ernest on Github</a>
        with the help of 
        <a href="https://github.com/">the Github, inc.</a>
      </p>
    </div>
  </footer>
</body>
</html>
