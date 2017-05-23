<!--現修課表-->
<a class="btn btn-primary col-12 d-flex justify-content-center" id="HeaderCurSelection" data-toggle="collapse" href="#CurSelection" aria-expanded="true" aria-controll="CurSelection">
    現修課表
</a>
<div id="CurSelection" class="collapse show">
  <div>
    <table id="cur_curriculum_th" class="table table-bordered table-striped table-sm">
      <thead> 
        <tr>
          <td>
            <a id="cur_c_week" onclick="cur_changeWD(this)" href="javascript:void(0)">週課表</a>
            <a id="cur_c_day" onclick="cur_changeWD(this)" href="javascript:void(0)">日課表</a>
          </td>
          <!--星期列-->
          @foreach ($general->days as $d)
          <td>
            <a onclick="cur_changeDContext(this.id)" id="cur_c_day{{$d->id}}" class="col cur_c_clear" href="javascript:void(0)">
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
            <td class="cur_c_dayn cur_c_day{{$d->id}}">
            @foreach ($general->cur_curriculum as $c)
              @foreach ($c->course->time as $t)
                <div class="d-flex justify-content-center">
                  @if ($t->period->name == $p->name && $t->day->name == $d->name)
                    <a>{{$c->course->name}}</a>
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
  </div>
</div>
<!--現修課表-->

<script>
(function() {
  cur_changeWD(this);
})()
function cur_changeWD(caller){
  tb = document.getElementById("cur_curriculum-tb");
  dn = document.getElementsByClassName("cur_c_dayn"); 
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
  d_hidden = document.getElementsByClassName("cur_c_dayn"); 
  document.getElementById("cur_c_week").setAttribute("hidden", "true");
  document.getElementById("cur_c_day").removeAttribute("hidden");
  //設定資料顯示
  for (var i = 0, l = d_hidden.length; i < l; i++) {
    d_hidden[i].setAttribute("hidden", "true");
  }
  d_display = document.getElementsByClassName(id);
  for (var i = 0, l = d_display.length; i < l; i++) {
    d_display[i].removeAttribute("hidden");
    d_display[i].setAttribute("colspan", "6");
  }
  cur_changeDTitle(id);
}
function cur_changeDTitle(id)
{
  highlight = document.getElementById(id);
  clear = document.getElementsByClassName("cur_c_clear");
  for (var i = 0, l = clear.length; i < l; i++) {
    clear[i].classList.remove("text-white", "bg-primary");
  }
  highlight.classList.add("text-white", "bg-primary");
}
</script>
