<!--預選課表-->
<a class="btn btn-primary col-12 d-flex justify-content-center" id="HeaderCurSelection" data-toggle="collapse" href="#CurSelection" aria-expanded="true" aria-controll="CurSelection">
    預選課表
</a>
<div id="CurSelection" class="collapse col-12">
  <div class="row d-flex justify-content-center">
    <div id="cur_curriculum_th" class="col-12">
      <div class="row">
        <div class="col-2 d-flex justify-content-center">
          <a id="cur_c_week" onclick="cur_changeWD(this)" href="javascript:void(0)">週課表</a>
          <a id="cur_c_day" onclick="cur_changeWD(this)" href="javascript:void(0)">日課表</a>
        </div>
        <!--星期列-->
        @foreach ($general->days as $d)
        <div class="col">
          <a onclick="cur_changeDContext(this.id)" id="cur_c_day{{$d->id}}" class="d-flex justify-content-center cur_c_clear" href="javascript:void(0)">
            {{$d->simple_name}}
          </a>
        </div>
        @endforeach
        <!--end 星期列-->
      </div>

      <div>
        @foreach ($general->periods as $p)
        <div class="row">
          <!--時間行-->
          <div class="col-2 d-flex justify-content-center">
            {{$p->name}}
            {{date('H:i', strtotime($p->上課時間))}}
            {{date('H:i', strtotime($p->下課時間))}}
          </div>
          <!--end 時間行-->
          <!--星期行-課表-->
          @foreach ($general->days as $d)
            <div class="cur_c_dayn cur_c_day{{$d->id}} col row">
            @foreach ($general->cur_curriculum as $c)
              @foreach ($c->course->time as $t)
                <div class="d-flex justify-content-center col-12">
                  @if ($t->period->name == $p->name && $t->day->name == $d->name)
                    <a>{{$c->course->name}}</a>
                  @endif
                </div>
              @endforeach
            @endforeach
            </div>
          @endforeach
          <!--end 星期行-課表-->
        </div>
        <hr class="my-0">
        @endforeach
      </div>
    </div>
  </div>
</div>
<!--預選課表-->

<script>
(function() {
  cur_changeWD(this);
})()
function cur_changeWD(caller){
  var tb = document.getElementById("cur_curriculum-tb");
  var dn = document.getElementsByClassName("cur_c_dayn"); 
  if (caller.id != "cur_c_week") {
    document.getElementById("cur_c_day").setAttribute("hidden", "true");
    document.getElementById("cur_c_week").removeAttribute("hidden");
    for (var i = 0, l = dn.length; i < l; i++) {
      dn[i].removeAttribute("hidden");
      dn[i].classList.remove("col-", "d-flex", "justify-content-center");
      dn[i].setAttribute("colspan", "1");
    }
    var clear = document.getElementsByClassName("cur_c_clear");
    for (var i = 0, l = clear.length; i < l; i++) {
      clear[i].classList.remove("text-white", "bg-primary");
    }
  }
  else {
    var today = "cur_c_day" + (new Date().getDay());
    if (today == "cur_c_day0")
      today="cur_c_day1";
    cur_changeDContext(today);
  }
}
function cur_changeDContext(id)
{
  var d_hidden = document.getElementsByClassName("cur_c_dayn"); 
  document.getElementById("cur_c_week").setAttribute("hidden", "true");
  document.getElementById("cur_c_day").removeAttribute("hidden");
  //設定資料顯示
  for (var i = 0, l = d_hidden.length; i < l; i++) {
    d_hidden[i].setAttribute("hidden", "true");
  }
  var d_display = document.getElementsByClassName(id);
  for (var i = 0, l = d_display.length; i < l; i++) {
    d_display[i].removeAttribute("hidden");
    d_display[i].setAttribute("colspan", "6");
  }
  cur_changeDTitle(id);
}
function cur_changeDTitle(id)
{
  var highlight = document.getElementById(id);
  var clear = document.getElementsByClassName("cur_c_clear");
  for (var i = 0, l = clear.length; i < l; i++) {
    clear[i].classList.remove("text-white", "bg-primary");
  }
  highlight.classList.add("text-white", "bg-primary");
}
</script>
