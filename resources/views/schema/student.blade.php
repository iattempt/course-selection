<!DOCTYPE html>
<html lang='zh-tw'>
  <meta charset="utf-8">
  <title>{{ $title }}</title>
  <link href="{{asset('css/bootstrap.theme.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
</html>
<body class="bd-docs" data-spy="scroll" data-target=".bd-sidenav-active">
  <a id="skippy" class="sr-only sr-only-focusable" href="#content">
    <div class="container">
      <span class="skiplink-text">Skip to main content</span>
    </div>
  </a>
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar w/ text</a>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
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
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">修課概覽</a>
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

  @section('sidebar')
      this is master section.
  @show

  <footer class="bd-footer text-muted">
    <div class="container">
      <p>
        <em>&copy 2017 Designed and built by Ernest.</em>
        maintained by the
        <a href="https://github.com/iattempt">Ernest on Github</a>
        with the help of 
        <a href="https://github.com/">the Github, inc.</a>
      </p>
    </div>
  </footer>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
