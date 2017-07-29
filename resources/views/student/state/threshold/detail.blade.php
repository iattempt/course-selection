<a class="btn btn-primary col-12" data-toggle="collapse" href="#detail_threshold" aria-expanded="true" aria-controll="detail_threshold">
    詳細資訊
</a>
<div id="detail_threshold" class="collapse container">
  <div class="row">
      <a class="btn btn-primary col-12" data-toggle="collapse" href="#threshold_未修" aria-expanded="true" aria-controll="threshold_未修">
          未修
      </a>
      <div id="threshold_未修" class="collapse col-12">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-5">
                課程名稱
              </div>
              <div class="col-4">
                應修年級
              </div>
              <div class="col-3">
                學分
              </div>
            </div>
          </div>
        </div>
        @foreach ($general->remain_list as $type_key => $type_value)
          <div class="row">
            <div class="col-4 bg-info align-self-start">
              {{$type_key}}
            </div>
            <div class="col-12">
            @foreach ($type_value as $key => $course)
              @if ($loop->index%2)
              <div class="row">
              @else
              <div class="row bg-faded">
              @endif
                <div class="col-5">
                  {{$course['課程名稱']}}
                </div>
                <div class="col-4">
                  {{$course['學期']}}
                </div>
                <div class="col-3">
                  {{$course['學分']}}
                </div>
              </div>
            @endforeach
            </div>
          </div>
        @endforeach
      </div>


    <!--     -->
    @foreach ($general->threshold as $state_key => $state_value)
      <a class="btn btn-primary col-12" data-toggle="collapse" href="#threshold_{{$state_key}}" aria-expanded="true" aria-controll="threshold_{{$state_key}}">
          {{$state_key}}
      </a>
      <div id="threshold_{{$state_key}}" class="collapse col-12">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-5">
                  課程名稱
                </div>
                <div class="col-4">
                  修課學期
                </div>
                <div class="col-3">
                  學分
                </div>
              </div>
            </div>
          </div>
        @foreach ($state_value as $type_key => $type_value)
          <div class="row">
            <div class="col-4 bg-info align-self-start">
              {{$type_key}}
            </div>
            <div class="col-12">
            @foreach ($type_value as $key => $course)
              @if ($loop->index%2)
              <div class="row">
              @else
              <div class="row bg-faded">
              @endif
                <div class="col-5">
                  {{$course['course_name']}}
                </div>
                <div class="col-4">
                  {{$course['year']}} - {{$course['semester']}}
                </div>
                <div class="col-3">
                  {{$course['credit']}}
                </div>
              </div>
            @endforeach
            </div>
          </div>
        @endforeach
      </div>
    @endforeach
  </div>
</div>
