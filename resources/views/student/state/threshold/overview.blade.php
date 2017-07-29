<a class="btn btn-primary col-12" data-toggle="collapse" href="#overview_threshold" aria-expanded="true" aria-controll="overview_threshold">
  整體狀態
</a>
<div id="overview_threshold" class="collapse container show my-3">
  <div class="row justify-content-center mx-1 mx-md-5">
    <div class="col-12">
      <div class="row">
        @foreach ($general->credit['Canvas'] as $type_key => $type_value)
        <div class="col-4 offset-lg-1 col-lg-2">
          <div class="row">
            <canvas id="{{$type_key}}" width="75" height="75"></canvas>
          </div>
          <div class="row">
            {{$type_key}}
          </div>
          <div class="row alert-danger">
            [{{$general->credit['學分狀態'][$type_key]}}]
          </div>
        </div>
        <div class="col-8 col-lg-3">
        @foreach ($general->credit['Canvas'][$type_key] as $state_key => $state_value)
          <div class="row">
          <canvas id="{{$type_key}}{{$state_key}}" width="25" height="25"></canvas>
            {{$state_key}}:{{ ($state_value['end']-$state_value['start'])!=0 ? (number_format(($state_value['end']-$state_value['start'])*50, 2)).'%' : '無'}}
          </div>
        @endforeach
          <hr class="bg-info">
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

<script>
window.onload = function(){
  var canvas_value = {!! json_encode($general->credit['Canvas']) !!};

  var i=0 ;
  for (type in canvas_value) {
    i++;
    var main_pie = document.getElementById(type).getContext("2d");
    for (state in canvas_value[type]) {
      main_pie.beginPath();
      //+1.5 是為了使得終點為12點鐘
      var start = canvas_value[type][state]['start']+1.5;
      var end = canvas_value[type][state]['end']+1.5;
      main_pie.arc(37.5, 37.5, 18.5, start * Math.PI, end * Math.PI);
      main_pie.lineWidth=37.5;
      var leading_text_rect = document.getElementById(type+state).getContext("2d");
      if (state == '未修過') {
        main_pie.strokeStyle='rgb(255, 0, 0)';
        leading_text_rect.fillStyle='rgb(255, 0, 0)';
      }
      else if (state == '已修完') {
        main_pie.strokeStyle='rgb(0, 255, 0)';
        leading_text_rect.fillStyle='rgb(0, 255, 0)';
      }
      else if (state == '修課中') {
        main_pie.strokeStyle='rgb(255, 230, 0)';
        leading_text_rect.fillStyle='rgb(255, 230, 0)';
      }
      else if (state == '預選中') {
        main_pie.strokeStyle='rgb(0, 255, 255)';
        leading_text_rect.fillStyle='rgb(0, 255, 255)';
      }

      if (end-start == 0) {
        main_pie.strokeStyle='rgb(230, 230, 230)';
        leading_text_rect.fillStyle='rgb(230, 230, 230)';
      }
      leading_text_rect.fillRect(0, 0, 25, 25);
      main_pie.stroke();
    }
  }
}
</script>
