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

  @section('main')
  @show

  <footer class="bd-footer text-muted">
    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col-11">
          <p>
            <em>&copy 2017 Designed and built by Ernest.</em>
            maintained by the
            <a href="https://github.com/iattempt">Ernest on Github</a>
            with the help of 
            <a href="https://github.com/">the Github, inc.</a>
          </p>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </footer>
</body>
</html>
