@extends('schema/bootstrap_cdn')
<!DOCTYPE html>
<html lang='zh-tw'>
  <head>
    <meta charset="utf-8">
    <title>{{ $general->title }}</title>
    @section('bootstrap_cdn')
      @parent
    @endsection
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
<body class="bd-docs" data-spy="scroll" data-target=".bd-sidenav-active">
  <a id="skippy" class="sr-only sr-only-focusable" href="#content">
    <span class="skiplink-text">Skip to main content</span>
  </a>
  @section('main-nav')
  @show
  @section('main')
  @show
  @section('footer')
  @show

