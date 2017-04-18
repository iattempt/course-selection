@extends('student/selection')
@section('selection')

<div class="container-fluid">
  <!-- Display result -->
  <div class="row">
    <div class="col-12">
      <ul class="list-group">
        <!-- title -->
        <li class="list-group-item row">
          @if ($general->identity == "student")
            <span class="col-1">退選</span>
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
        @if (count($general->lists))
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
</div>

@endsection
