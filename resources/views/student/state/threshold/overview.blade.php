<a class="btn btn-primary col-12" data-toggle="collapse" href="#overview_threshold" aria-expanded="true" aria-controll="overview_threshold">
  整體狀態
</a>
<div id="overview_threshold" class="collapse container show my-3">
  <div class="row justify-content-center mx-5">
    <div class="col-12">
      <div class="row">
        @foreach ($general->credit['Canvas'] as $type_key => $type_value)
        <div class="col-6 offset-lg-1 col-lg-2">
          <div class="row">
            <canvas id="{{$type_key}}" width="100" height="100"></canvas>
          </div>
          <div class="row">
            {{$type_key}}
          </div>
        </div>
        <div class="col-6 col-lg-3">
        @foreach ($general->credit['Canvas'][$type_key] as $state_key => $state_value)
          <div>
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
    var ctx = document.getElementById(type).getContext("2d");
    for (state in canvas_value[type]) {
      ctx.beginPath();
      var start = canvas_value[type][state]['start'];
      var end = canvas_value[type][state]['end'];
      ctx.arc(50, 50, 24, start * Math.PI, end * Math.PI);
      ctx.lineWidth=50;
      var ctext = document.getElementById(type+state).getContext("2d");
      if (state == '未修過') {
        ctx.strokeStyle='rgb(255, 0, 0)';
        ctext.fillStyle='rgb(255, 0, 0)';
      }
      else if (state == '已修完') {
        ctx.strokeStyle='rgb(0, 255, 0)';
        ctext.fillStyle='rgb(0, 255, 0)';
      }
      else if (state == '修課中') {
        ctx.strokeStyle='rgb(255, 230, 0)';
        ctext.fillStyle='rgb(255, 230, 0)';
      }
      else if (state == '預選中') {
        ctx.strokeStyle='rgb(0, 255, 255)';
        ctext.fillStyle='rgb(0, 255, 255)';
      }

      if (end-start == 0) {
        ctx.strokeStyle='rgb(230, 230, 230)';
        ctext.fillStyle='rgb(230, 230, 230)';
      }
      ctext.fillRect(0, 0, 25, 25);
      ctx.stroke();
    }
  }
}
</script>
