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

  @section('main')
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
