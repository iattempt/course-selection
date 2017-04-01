@extends('pre-selection')
@section('main')
@parent

  <form action="/sign_out" method="post">
    {{ csrf_field() }}
    <!-- Filter -->
    <div class="row">
      <a class="btn btn-danger col-12" data-toggle="collapse"  data-parent=""href="#filter" aria-expanded="false" aria-controls="filter">
        篩選器
      </a>
      <div id="filter" class="collapse col-12">
        <div class="card">
          <!-- Filter options-->
          <div id="filter_options" role="tablist" aria-multiselectable="true">
          @if(count($general->lists) > 0)
            @foreach ($general->lists as $list)
              @include ('course_search_partials/filter_option')
            @endforeach
            @foreach ($general->lists as $list)
              @include ('course_search_partials/filter_option_div')
            @endforeach
          @else
            None.
          @endif
          </div>
          <!-- end of Filter options  -->
        </div>
        <r class="my-4">
      </div>
    </div>
    <!-- end of Filter form  -->
  </form>
  <!-- Display result -->
  <div class="row">
    <div class="col-12">
      <ul class="list-group">
        <!-- title -->
        <li class="list-group-item row">
          @if ($general->identity === "student")
            <span class="col-1">加選</span>
            <span class="col-6">課程名稱</span>
          @else
          <span class="col-7">課程名稱</span>
          @endif
          <span class="col-2">授課教師</span>
          <span class="col-1">修別</span>
          <span class="col-1">星期</span>
          <span class="col-1">時段</span>
        </li>
        <!-- end of title -->
        <!-- lists -->
        @if(count($general->lists) > 0)
          @foreach ($general->lists as $list)
            @include ('course_search_partials/course_list')
          @endforeach
        @else
          <div>None.</div>  
        @endif
        <!-- end of lists -->
      </ul>
    </div>
  </div>
  <!-- end of Display result-->

@endsection
