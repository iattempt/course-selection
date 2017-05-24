<!--現修課表-->
<a class="btn btn-primary col-12" data-toggle="collapse" href="#pre_prericulum_th" aria-expanded="true" aria-controll="pre_prericulum_th">
    現修課表
</a>
<div id="pre_prericulum_th" class="collapse col-12">
  <!--標題列-->
  <div class="row">
    <div class="col-2">
      <!--星期列最左邊-->
      <div class="row">
        <div class="col-12">
          <a id="pre_header_day" class="btn-block pre_col_clear d-flex justify-content-center" onclick="PreChangeToWeekOrDay(this)" href="javascript:void(0)">週課表</a>
        </div>
      </div>
      <!--end 星期列最左邊-->
    </div>
    <div class="col-10">
      <!--星期列-->
      <div class="row">
      @foreach ($general->days as $d)
        <div class="col-2">
          <a onclick="PreChangeContextOfDays(this.id)" id="pre_col_day{{$d->id}}" class="btn-block pre_col_clear d-flex justify-content-center" href="javascript:void(0)">
            {{$d->name}}
          </a>
        </div>
      @endforeach
      </div>
      <!--end 星期列-->
    </div>
  </div>
  <hr class="row my-0">
  <!--end 標題列-->

  @foreach ($general->periods as $p)
  <!--課表-->
  <div class="row">
    <!--課表最左邊  時間行-->
    <div class="col-2">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          {{$p->name}}
          {{date('H:i', strtotime($p->上課時間))}}
          {{date('H:i', strtotime($p->下課時間))}}
        </div>
      </div>
    </div>
    <!--end 課表最左邊  時間行-->
    <!--課表內容-->
    <div class="col-10">
      <div class="row">
      @foreach ($general->days as $d)
        <div class="col-2 pre_days_n pre_col_day{{$d->id}}">
    @foreach ($general->pre_curriculum as $c)
      @foreach ($c->course->times as $t)
        @if ($t->period->name == $p->name && $t->day->name == $d->name)
          <div class="d-flex justify-content-center pre_col_clear">
            <a>{{$c->course->name}}</a>
          </div>
        @endif
      @endforeach
    @endforeach
        </div>
      @endforeach
      </div>
    </div>
    <!--end 課表內容-->
  </div>
  <!--end 課表-->

  <hr class="row my-0">
  @endforeach
</div>
<!--預選課表-->

<script>
(function() {
  PreChangeToWeekOrDay(this);
})()
function PreChangeToWeekOrDay(caller){
  var days = document.getElementsByClassName("pre_days_n"); 
  if (caller.id != "pre_header_week") {
    //代表點選星期
    document.getElementById("pre_header_day").setAttribute("hidden", "true");
    for (var i = 0, l = days.length; i < l; i++) {
      days[i].removeAttribute("hidden");
      days[i].classList.remove('col-12');
    }
    PreRemoveAllBg();
    document.getElementById("pre_header_day").parentNode.classList.add("bg-info");
  }
  else {
    var today = "pre_col_day" + (new Date().getDay());
    if (today == "pre_col_day0")
      today="pre_col_day1";
    PreChangeContextOfDays(today);
  }
}
function PreChangeContextOfDays(id)
{
  document.getElementById("pre_header_day").removeAttribute("hidden");

  var d_hidden = document.getElementsByClassName("pre_days_n"); 
  //將所有資料隱藏
  for (var i = 0, l = d_hidden.length; i < l; i++) {
    d_hidden[i].setAttribute("hidden", "true");
  }
  //將caller資料顯示
  var d_display = document.getElementsByClassName(id);
  for (var i = 0, l = d_display.length; i < l; i++) {
    d_display[i].removeAttribute("hidden");
    d_display[i].classList.add('col-12');
  }
  PreChangeTitleOfDays(id);
}
function PreChangeTitleOfDays(id)
{
  var highlight = document.getElementById(id);
  PreRemoveAllBg();
  highlight.parentNode.classList.add("bg-info");
}
function PreRemoveAllBg()
{
  var clear = document.getElementsByClassName("pre_col_clear");
  for (var i = 0, l = clear.length; i < l; i++) {
    clear[i].parentNode.classList.remove("bg-info");
  }
}
</script>
