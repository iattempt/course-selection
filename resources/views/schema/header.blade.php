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
  @section('main-nav')
  @show
  @section('main')
  @show
  @section('footer')
  @show
