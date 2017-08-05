@extends('schema/header')
@section('footer')

<div class="bg-inverse text-white" style="position: absolute; bottom:0; width: 100%;">
  <div class="container-fluid">
    <div class="row">
      <span class="mx-auto">
        &copy;2016-<?php echo date('Y'); ?>
      <div class="hidden-md-up col-12"></div>
        Power by
        <a class="text-white" style="text-decoration: underline" href="http://www.iattempt.net">Ernest</a>
        <div class="col-12"></div>
        <a class="text-white" style="text-decoration: underline" href="https://github.com/iattempt">Contribution</a>
        &nbsp;|&nbsp;
        <a class="text-white" style="text-decoration: underline" href="/feedback">Feedback</a>
      </span>
    </div>
  </div>
</div>

@endsection
