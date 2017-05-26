<a class="btn btn-primary col-12" data-toggle="collapse" href="#detail_threshold" aria-expanded="true" aria-controll="detail_threshold">
    詳細資訊
</a>
<div id="detail_threshold" class="collapse col-12">
  @foreach ($general->threshold as $state_key => $state_value)
    <a class="btn btn-primary col-12" data-toggle="collapse" href="#threshold_{{$state_key}}" aria-expanded="true" aria-controll="threshold_{{$state_key}}">
        {{$state_key}}
    </a>
    <div id="threshold_{{$state_key}}" class="collapse col-12">
      @foreach ($state_value as $type_key => $type_value)
        <div class="row">
          <div class="col-12">
            {{$type_key}}
          </div>
        @foreach ($type_value as $key => $course)
          <div class="col-4 offset-1">
            {{$course['course_name']}}
          </div>
          <div class="col-1">
            {{$course['year']}}
          </div>
          <div class="col-1">
            {{$course['semester']}}
          </div>
          <div class="col-1">
            {{$course['credit']}}
          </div>
          <hr class="col-12 my-0">
        @endforeach
        </div>
      @endforeach
    </div>
  @endforeach
</div>
