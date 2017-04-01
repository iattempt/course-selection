@extends('schema/bootstrap_cdn')
<!DOCTYPE html>
<html lang='zh-tw' style="min-height: 100%; position: relative;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ ucfirst($general->title) }}</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
  @section('bootstrap_cdn')
  @parent
  @endsection
</head>
<body data-spy="scroll" data-target=".bd-sidenav-active">
  <a id="skippy" class="sr-only sr-only-focusable" href="#content">
    <span class="skiplink-text">Skip to main content</span>
  </a>
  @section('header')
  @show
  @section('main')
  @show
  @section('footer')
  @show
  @section('script')
  @show
</body>
</html>
