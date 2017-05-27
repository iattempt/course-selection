<a class="btn btn-primary col-12" data-toggle="collapse" href="#overview_threshold" aria-expanded="true" aria-controll="overview_threshold">
  整體狀態
</a>
<div id="overview_threshold" class="collapse container show">
  <div class="row justify-content-center">
    @foreach ($general->credit['Canvas'] as $type_key => $type_value)
    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
      <div class="row justify-content-center">
        <canvas id="{{$type_key}}" class="col-12"></canvas>
        <div class="col-12">{{$type_key}}</div>
      </div>
      <div class="row justify-content-center">
        @foreach ($general->credit['Canvas'][$type_key] as $state_key => $state_value)
          <div class="col-12">
            <canvas id="{{$type_key}}{{$state_key}}" width="50" height="50"></canvas>
            {{$state_key}}:{{ ($state_value['end']-$state_value['start'])!=0 ? (number_format(($state_value['end']-$state_value['start'])*50, 2)).'%' : '無'}}
          </div>
        @endforeach
      </div>
      <hr class="col-12">
    </div>
    @endforeach
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
      ctx.arc(55, 55, 25, start * Math.PI, end * Math.PI);
      ctx.lineWidth=30;
      var ctext = document.getElementById(type+state).getContext("2d");
      if (state == '未修過') {
        ctx.strokeStyle='rgb(255, 0, 0)';
        ctext.fillStyle='rgb(255, 0, 0)';
      }
      else if (end-start == 0) {
        ctx.strokeStyle='rgb(230, 230, 230)';
        ctext.fillStyle='rgb(230, 230, 230)';
      }
      else {
        ctx.strokeStyle='rgb(0, ' +
                                Math.floor(255 - end*100) + ', ' + 
                                Math.floor(255 - end*start*50) +')';
        ctext.fillStyle='rgb(0, ' +
                                Math.floor(255 - end*100) + ', ' + 
                                Math.floor(255 - end*start*50) +')';
      }
      ctext.fillRect(25, 25, 25, 25);
      ctx.stroke();
    }
  }
}
</script>
