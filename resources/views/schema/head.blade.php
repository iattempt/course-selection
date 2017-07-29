@extends('schema/bootstrap_cdn')
<!DOCTYPE html>
<html lang='zh-tw' style="min-height: 100%; position: relative;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ ucfirst($general->title) }}</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<!-- Adjust CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/own.css') }}" />
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  @section('bootstrap_cdn')
  @parent
  @endsection
</head>
<body data-spy="scroll" data-target=".bd-sidenav-active">
  <a id="skippy" class="sr-only sr-only-focusable" href="#content">
    <span class="skiplink-text">Skip to main content</span>
  </a>
  @yield ('header')
  <div class="my-3"></div>
  @include ('schema/message')
  @yield ('main')
  <div style="padding-bottom: 100px"></div> <!-- footer space -->
  @yield ('footer')
  @yield ('script')
</body>
</html>
