<a class="btn btn-primary col-12" data-toggle="collapse" href="#force_threshold" aria-expanded="true" aria-controll="force_threshold">
    必修概況
</a>
<div id="force_threshold" class="collapse col-12 show">
  <!--標題-->
  <div class="row">
    <div class="col-7 offset-1">
      課程名稱
    </div>
    <div class="col-4">
      學年-學期
    </div>
  </div>
  <!--end 標題-->
  <!--內容-->
@foreach ($general->threshold_force as $key => $type)
  <div class="row">
    {{$key}}
  </div>
  @foreach ($type as $course)
    @if ($loop->index%2)
    <div class="row ">
    @else
    <div class="row bg-faded">
    @endif
      <div class="col-7 offset-1">
        {{$course['course_name']}}
      </div>
      <div class="col-4">
        {{$course['adopt_semester']}}
      </div>
    </div>
    <hr class="my-0">
  @endforeach
@endforeach
  <!--end 內容-->
</div>
