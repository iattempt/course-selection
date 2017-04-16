@extends('pre-selection')
@section('main')
@parent

<div class="container-fluid">
  <!-- Display Pre-Curriculum -->
    @include ('course_search_partials/pre_curriculum')
  <!-- end of Display Pre-Curriculum -->
  <!-- Filter -->
    @include ('course_search_partials/filter')
  <!-- end of Filter form  -->
  <!-- Display result -->
    @include ('course_search_partials/course_list')
  <!-- end of Display result-->
</div>
@endsection
