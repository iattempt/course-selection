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
          <div class="col-2 bg-info">
            {{$type_key}}
          </div>
          <div class="col-12">
          @foreach ($type_value as $key => $course)
            @if ($loop->index%2)
            <div class="row">
            @else
            <div class="row bg-faded">
            @endif
              <div class="col-4">
                {{$course['course_name']}}
              </div>
              <div class="col-2">
                {{$course['year']}}
              </div>
              <div class="col-1">
                {{$course['semester']}}
              </div>
              <div class="col-1">
                {{$course['credit']}}
              </div>
              <hr class="col-12 my-0">
            </div>
          @endforeach
          </div>
        </div>
      @endforeach
    </div>
  @endforeach
</div>
