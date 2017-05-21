@extends('student/state')
@section('state')

<div class="row d-flex justify-content-center">
  目前為:
  <div class="hidden-md-up"></div>
  <a id="c_pre" onclick="changeState(this)" href="javascript:void(0)">預選課表</a>
  <a id="c_cur" onclick="changeState(this)" href="javascript:void(0)">學期課表</a>
  <div class="hidden-md-up"></div>
  <a id="c_week" onclick="changeWD(this)" href="javascript:void(0)">週課表</a>
  <a id="c_day" onclick="changeWD(this)" href="javascript:void(0)">日課表</a>
</div>
    <table id="curriculum_th" class="table table-bordered table-striped table-sm">
      <thead> 
        <tr>
          <td></td>
          <!--星期列-->
          @foreach ($general->days as $d)
          <td>
            <a onclick="changeDContext(this.id)" id="c_day{{$d->id}}" class="col c_clear" href="javascript:void(0)">
              {{$d->simple_name}}
            </a>
          </td>
          @endforeach
          <!--end 星期列-->
        </tr>
      </thead>

      <tbody>
        @foreach ($general->periods as $p)
        <tr>
          <!--時間行-->
          <td>
            {{$p->name}}
            {{date('H:i', strtotime($p->上課時間))}}
            {{date('H:i', strtotime($p->下課時間))}}
          </td>
          <!--end 時間行-->
          <!--星期行-課表-->
          @foreach ($general->days as $d)
            <td class="c_dayn c_day{{$d->id}}">
            @foreach ($general->curricula as $c)
              @foreach ($c->course->times as $t)
                <div class="d-flex justify-content-center">
                  @if ($t->day->name == $d->name && $t->period->name == $p->name)
                    @if ($c->state=="預選中") 
                      <a class="state_pre">{{$c->course->name}}</a>
                    @elseif ($c->state=="修課中")
                      <a class="state_now">{{$c->course->name}}</a>
                    @endif
                    @break
                  @endif
                </div>
              @endforeach
            @endforeach
            </td>
          @endforeach
          <!--end 星期行-課表-->
        </tr>
        @endforeach
      </tbody>
    </table>

<script>
(function() {
  changeWD(this);
  changeState(this);
})()
function changeState(caller){
  var tb = document.getElementById("curriculum-tb");
  var pre = document.getElementsByClassName("state_pre");
  var now = document.getElementsByClassName("state_now"); 
  if (caller.id == "c_cur") {
    document.getElementById("c_cur").setAttribute('hidden', 'true');
    document.getElementById("c_pre").removeAttribute('hidden');
    for (var i = 0, l = pre.length; i < l; i++) {
      pre[i].removeAttribute('hidden');
    }
    for (var i = 0, l = now.length; i < l; i++) {
      now[i].setAttribute('hidden', 'true');
    }
  }
  else {
    document.getElementById("c_pre").setAttribute('hidden', 'true');
    document.getElementById("c_cur").removeAttribute('hidden');
    for (var i = 0, l = now.length; i < l; i++) {
      now[i].removeAttribute('hidden');
    }
    for (var i = 0, l = pre.length; i < l; i++) {
      pre[i].setAttribute('hidden', 'true');
    }
  }
}
function changeWD(caller){
  var tb = document.getElementById("curriculum-tb");
  var dn = document.getElementsByClassName("c_dayn"); 
  if (caller.id != "c_week") {
    document.getElementById("c_day").setAttribute("hidden", "true");
    document.getElementById("c_week").removeAttribute("hidden");
    for (var i = 0, l = dn.length; i < l; i++) {
      dn[i].removeAttribute("hidden");
      dn[i].classList.remove("col-", "d-flex", "justify-content-center");
      dn[i].setAttribute("colspan", "1");
    }
    var clear = document.getElementsByClassName("c_clear");
    for (var i = 0, l = clear.length; i < l; i++) {
      clear[i].classList.remove("text-danger");
    }
  }
  else {
    var today = "c_day" + (new Date().getDay());
    if (today == "c_day0")
      today="c_day1";
    changeDContext(today);
  }
}
function changeDContext(id)
{
  var d_hidden = document.getElementsByClassName("c_dayn"); 
  document.getElementById("c_week").setAttribute("hidden", "true");
  document.getElementById("c_day").removeAttribute("hidden");
  //設定資料顯示
  for (var i = 0, l = d_hidden.length; i < l; i++) {
    d_hidden[i].setAttribute("hidden", "true");
  }
  var d_display = document.getElementsByClassName(id);
  for (var i = 0, l = d_display.length; i < l; i++) {
    d_display[i].removeAttribute("hidden");
    d_display[i].setAttribute("colspan", "6");
  }
  changeDTitle(id);
}
function changeDTitle(id)
{
  var highlight = document.getElementById(id);
  var clear = document.getElementsByClassName("c_clear");
  for (var i = 0, l = clear.length; i < l; i++) {
    clear[i].classList.remove("text-danger");
  }
  highlight.classList.add("text-danger");
}
</script>

@endsection
