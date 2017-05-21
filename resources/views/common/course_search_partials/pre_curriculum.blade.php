@if ($general->info->type == "student")
<div class="row">
  <a id="filter-controller" class="btn btn-primary col-12" data-toggle="collapse"  data-parent="" href="#curriculum" aria-expanded="false" aria-controls="curriculum">
    預選課表
    <span class="glyphicon glyphicon-triangle-bottom"></span>
  </a>

  <div id="curriculum" class="collapse col-12">
    <div class="row d-flex justify-content-center">
      <div id="curriculum_th" class="col-12">
        <!--狀態列-->
        <div class="row d-flex justify-content-center">
          &nbsp;&nbsp;&nbsp;&nbsp;
          目前為:
          &nbsp;
          <a id="c_week" onclick="changeWD(this)" href="javascript:void(0)">週課表</a>
          <a id="c_day" onclick="changeWD(this)" href="javascript:void(0)">日課表</a>
          &nbsp;(點選以切換)
        </div>
        <!--end 狀態列-->
        <!--星期列-->
        <div class="row d-flex justify-content-center">
          <div class="col-2 d-flex justify-content-center">
          </div>
          @foreach ($general->days as $d)
            <a onclick="changeD(this.id)" id="c_day{{$d->id}}" href="javascript:void(0)" class="col c_clear">
              {{$d->simple_name}}
            </a>
          @endforeach
        </div>
        <!--end 星期列-->
      </div>
      <div id="curriculum_tb" class="col-12">

      @foreach ($general->periods as $p)
        @if ($p->id%2 == 0)
        <div class="row d-flex justify-content-center">
        @else
        <div class="row d-flex justify-content-center bg-faded">
        @endif
          <!--時間行-->
          <div class="col-2">
            <div class="d-flex justify-content-center">
            {{$p->name}}
            </div>
            <div class="d-flex justify-content-center">
            {{date('H:i', strtotime($p->上課時間))}}
            </div>
            <div class="d-flex justify-content-center">
            {{date('H:i', strtotime($p->下課時間))}}
            </div>
          </div>
          <!--end 時間行-->
          <!--星期行-課表-->
          @foreach ($general->days as $d)
            <div class="c_dayn c_day{{$d->id}} col">
            @foreach ($general->curricula as $c)
              @foreach ($c->course->times as $t)
                @if ($t->day->name == $d->name && $t->period->name == $p->name)
                  @if ($c->state=="預選中") 
                    <a class="state_pre">{{$c->course->name}}</a>
                  @endif
                  @break
                @endif
              @endforeach
            @endforeach
            </div>
          @endforeach
          <!--end 星期行-課表-->
        </div>
      @endforeach
      
      </div>
    </div>
  </div>
</div>

<script>
(function() {
  changeWD(this);
// || ! ((screen.width < 768) || (window.matchMedia && window.matchMedia("only screen and (max-width: 640px)").matches))
})()
function changeWD(caller){
  var tb = document.getElementById("curriculum-tb");
  var dn = document.getElementsByClassName("c_dayn"); 
  if (caller.id != "c_week") {
    document.getElementById("c_day").setAttribute("hidden", "true");
    document.getElementById("c_week").removeAttribute("hidden");
    for (var i = 0, l = dn.length; i < l; i++) {
      dn[i].removeAttribute("hidden");
      dn[i].classList.remove("col-", "d-flex", "justify-content-center");
    }
    var clear = document.getElementsByClassName("c_clear");
    for (var i = 0, l = clear.length; i < l; i++) {
      clear[i].classList.remove("text-white", "bg-primary");
    }
  }
  else {
    var today = "c_day" + (new Date().getDay());
    if (today == "c_day0")
      today="c_day1";
    changeD(today);
  }
}
function changeD(id)
{
  var dn = document.getElementsByClassName("c_dayn"); 
  document.getElementById("c_week").setAttribute("hidden", "true");
  document.getElementById("c_day").removeAttribute("hidden");
  //設定資料顯示
  for (var i = 0, l = dn.length; i < l; i++) {
    dn[i].setAttribute("hidden", "true");
    dn[i].classList.remove("col-", "d-flex", "justify-content-center");
  }
  temp_d = id;
  var dv = document.getElementsByClassName(temp_d);
  for (var i = 0, l = dv.length; i < l; i++) {
    dv[i].removeAttribute("hidden");
    dv[i].classList.add("col-", "d-flex", "justify-content-center");
  }
  changeDTitle(id);
}
function changeDTitle(id)
{
  var highlight = document.getElementById(id);
  var clear = document.getElementsByClassName("c_clear");
  for (var i = 0, l = clear.length; i < l; i++) {
    clear[i].classList.remove("text-white", "bg-primary");
  }
  highlight.classList.add("text-white", "bg-primary");
}
</script>
@endif
