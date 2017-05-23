@extends ($general->identity)

@section ($general->identity)
<div class="container-fluid">
  <!-- Display Pre-Curriculum -->
    <div class="row">
      @include ('student/state/pre_curriculum')
    </div>
  <!-- end of Display Pre-Curriculum -->

  <!-- Filter -->
    @include ('common/course_search_partials/filter')
  <!-- end of Filter form  -->

  <!-- Display result -->
  <div class="row">
    <div class="col-12">
      <form action="course_search" method="POST">
        {{ csrf_field() }}
      <ul class="list-group">
        <!-- title -->
        <li class="list-group-item row">
          <button type="submit" class="col-2 col-md-1 btn btn-success">
            <span class="hidden-md-down">送出</span>
            <i class="glyphicon glyphicon-plus"></i>
          </button>
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
          @include ('common/course_search_partials/course_list')
        @endforeach
        <!-- end of lists -->
      </ul>
      </form>
    </div>
  </div>
  <!-- end of Display result-->
</div>
@endsection
