@extends('pre-selection')
@section('main')
@parent

<div class="container-fluid">
  <!-- Filter -->
    @include ('course_search_partials/filter')
  <!-- end of Filter form  -->
  <!-- Display result -->
  <div class="row">
    <div class="col-12">
      <ul class="list-group">
        <!-- title -->
        <li class="list-group-item row">
          <a href="javascript:void(0)" class="col-4">
            課程名稱
            <span class="dropdown-toggle"></span>
          </a>
          <a href="javascript:void(0)" class="col-3">
            授課教師
            <span class="dropdown-toggle"></span>
          </a>
          <a href="javascript:void(0)" class="col-1">
            修別
            <span class="dropdown-toggle"></span>
          </a>
          <a href="javascript:void(0)" class="col">
            星期/時段
            <span class="dropdown-toggle"></span>
          </a>
          <a href="javascript:void(0)" class="col-1 hidden-sm-down">
            學分
            <span class="dropdown-toggle"></span>
          </a>
          <a href="javascript:void(0)" class="col-1 hidden-sm-down">
            教室
            <span class="dropdown-toggle"></span>
          </a>
        <!--
        @if ($general->identity === "student")
          <span class="col">加選</span>
        @endif
        -->
        </li>
        <!-- end of title -->
        <!-- lists -->
        @include ('course_search_partials/course_list')
        <!-- end of lists -->
      </ul>
    </div>
  </div>
  <!-- end of Display result-->
</div>
@endsection
