@extends('student/state')
@section('state')

<div id="test"></div>
<div class="container-fluid">
  <div class="row d-flex mx-auto">
    <div class="col-12 bg-faded text-center text-muted">
      <div class="mx-auto">
        切換為:&nbsp;&nbsp;
        <a id="change_state" onclick="change(this)" href="javascript:void(0)" ="">學期課表</a>&nbsp;&nbsp;
        <a id="change_wd" onclick="change(this)" href="javascript:void(0)" cla>週課表</a>
      </div>
    </div>
    <div id="curriculum_th" class="col-12">
      <div class="row">
        <div class="col"></div>
        @foreach($general->days as $d)
          <div class="col">
            {{$d->name}}
          </div>
        @endforeach
      </div>
    </div>
    <div id="curriculum_tb" class="col-12">
    @foreach($general->periods as $p)
      @if($p->id%2==0)
      <div class="row d-flex">
      @else
      <div class="row d-flex bg-faded">
      @endif
        <div class="col">{{$p->name}}</div>
        @foreach($general->days as $d)
        <div class="col">
          @foreach($general->curricula as $c)
            @foreach ($c->course->time as $t)
              @if ($t->day->name == $d->name && $t->period->name == $p->name)
              {{$c->course->name}}
                @break
              @endif
            @endforeach
          @endforeach
        </div>
        @endforeach
      <hr>
    </div>
    @endforeach
    </div>
  </div>
</div>
<!--
<script>
(function(){
  change(this);
})();
change.state;
change.wd;
change.day;
change.period;
change.days;
function change(who) {
  //init
  if (typeof change.__initialized == "undefined") {
    change.state = "pre";
    change.wd= "week";
    periods = {!! json_encode($general->periods)!!};
    days = {!! json_encode($general->days) !!};
    change.day = days[new Date().getDay()];

    change.__initialized = true;

    //according media distinguish default of change.wd
    if((screen.width < 768) || (window.matchMedia && window.matchMedia('only screen and (max-width: 640px)').matches)) {
      change.wd = "day";
    }
  }

  var curricula= {!! json_encode($general->curricula) !!};

  //change properties
  if (who.id == "change_state")
    change.state = change.state == "pre" ? "normal" : "pre" ;
  else if (who.id == "change_wd")
    change.wd = change.wd == "week" ? "day" : "week";
  else {
    for (var i = 0, l = change.days.length; i < l; i++) {
      if (who.id == change.days[i])
          change.day = change.days[i];
    }
  }



  //refresh view
  var th = document.getElementById('curriculum_th');
  th.innerHTML="";

  th.insertAdjacentHTML('beforeend', '\
  <div class="row bg-faded text-center text-muted">\
    <div class="mx-auto">\
      切換為:&nbsp;&nbsp;\
      <a id="change_state" onclick="change(this)" href="javascript:void(0)" ="">'+ (change.state == "pre" ? "學期課表" : "預選中課表") +'</a>&nbsp;&nbsp;\
      <a id="change_wd" onclick="change(this)" href="javascript:void(0)" cla>'+ (change.wd == "week" ? "日課表" : "週課表") + '</a>\
    </div>\
  </div>\
  <div class="row d-flex text-center my-2">\
    <div class="col-1">\
  </div>');

  td = th.lastChild;
  for (var i=1; i<=6; i++) {
    if (change.wd == 'week') {
      td.insertAdjacentHTML('beforeend', ''+
        '<a id="w'+i+'" onclick="change(this)" class="col btn " '+(change.wd == "day" ? "href=javascript:void(0)":"")+'>'+days[i-1]+'\
        </a>');
    }
    else if (change.wd == 'day') {
      if (change.day == 'w'+i) {
        td.insertAdjacentHTML('beforeend', ''+
        '<a id="w'+i+'" onclick="change(this)" class="col btn text-whitebg-primary">'+days[i-1]+'\
          </a>');
      }
      else {
        td.insertAdjacentHTML('beforeend', ''+
          '<a id="w'+i+'" onclick="change(this)" class="col btn" '+(change.wd == "day" ? "href=javascript:void(0)":"")+'>'+days[i-1]+'\
          </>');
      }
    }
  }

  th.insertAdjacentHTML('afterend', '</div></div>');

  //clear
  var tb = document.getElementById('curriculum_tb');
  tb.innerHTML="";


  for (var i in periods) {
    // per line
    if (i%2 == 0)
      tb.insertAdjacentHTML('beforeend', '<div class="row text-center">');
    else
      tb.insertAdjacentHTML('beforeend', '<div class="row text-center bg-faded">');
      

    // append period per line
    var tr = tb.lastChild;
    tr.insertAdjacentHTML('beforeend', '<div class="p-2 col-1 text-center">');
      var td = tr.lastChild;
      td.insertAdjacentHTML('beforeend', periods[i]);
    tr.insertAdjacentHTML('beforeend', '</div>');

    if (change.wd == 'week') {
      for (var j in days) {
        tr.insertAdjacentHTML('beforeend', '<div class="p-2 col text-center">');
        for (var k in curricula) {
          td = tr.lastChild;
          if (curricula[k].day_name == days[j].name && lists[k].period_name == periods[i].name){
            if (change.state == 'pre' && lists[k].state == '預選中')
              td.insertAdjacentHTML('beforeend', lists[k].name);
            else if (change.state == 'normal' && lists[k].state == '修課中')
              td.insertAdjacentHTML('beforeend', lists[k].name);
          }
        }
        tr.insertAdjacentHTML('beforeend', '</div>');
      }
    }
    else if (change.wd == 'day') {
      tr.insertAdjacentHTML('beforeend', '<div class="p-2 col text-center">');
      for (var k in lists) {
        td = tr.lastChild;
        if (lists[k].day_name == change.day && lists[k].period_name == periods[i].name){
          if (change.state == 'pre' && lists[k].state == '預選中')
            td.insertAdjacentHTML('beforeend', lists[k].name);
          else if (change.state == 'normal' && lists[k].state == '修課中')
            td.insertAdjacentHTML('beforeend', lists[k].name);
        }
      }
        tr.insertAdjacentHTML('beforeend', '</div>');
    }
    tb.insertAdjacentHTML('beforeend', '</div>');
  }
};
</script>
-->

@endsection
