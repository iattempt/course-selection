@extends ($general->identity)

@section ($general->identity)
<div class="container-fluid">
  <!-- Display Pre-Curriculum -->
    @include ('common/course_search_partials/pre_curriculum')
  <!-- end of Display Pre-Curriculum -->
  <!-- Display result -->
  <div class="row">
    <div class="col-12">
      <ul class="list-group">
        <!-- title -->
        <li class="list-group-item row">
          <div class="col-2 col-md-1"></div>
          <a href="javascript:void(0)" class="col-3">
            課程名稱
            <span class="dropdown-toggle"></span>
          </a>
          <a href="javascript:void(0)" class="col-3 col-md-2">
            授課教師
            <span class="dropdown-toggle"></span>
          </a>
          <a href="javascript:void(0)" class="col-2">
            修別
            <span class="dropdown-toggle"></span>
          </a>
          <a href="javascript:void(0)" class="col-1">
            上課時間
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
        </li>
        <!-- end of title -->
        <!-- lists -->
        @foreach ($general->lists as $list)
          @include ('student/selection/drop/course_list')
        @endforeach
        <!-- end of lists -->
      </ul>
    </div>
  </div>
  <!-- end of Display result-->
</div>
@endsection
