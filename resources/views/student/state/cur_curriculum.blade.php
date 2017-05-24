<!--現修課表-->
<a class="btn btn-primary col-12" data-toggle="collapse" href="#cur_curriculum_th" aria-expanded="true" aria-controll="cur_curriculum_th">
    現修課表
</a>
<div id="cur_curriculum_th" class="collapse col-12">
  <!--標題列-->
  <div class="row">
    <div class="col-2">
      <!--星期列最左邊-->
      <div class="row">
        <div class="col-12">
          <a id="cur_header_day" class="btn-block cur_col_clear d-flex justify-content-center" onclick="CurChangeToWeekOrDay(this)" href="javascript:void(0)">週課表</a>
        </div>
      </div>
      <!--end 星期列最左邊-->
    </div>
    <div class="col-10">
      <!--星期列-->
      <div class="row">
      @foreach ($general->days as $d)
        <div class="col-2">
          <a onclick="CurChangeContextOfDays(this.id)" id="cur_col_day{{$d->id}}" class="btn-block cur_col_clear d-flex justify-content-center" href="javascript:void(0)">
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
        <div class="col-2 cur_days_n cur_col_day{{$d->id}}">
    @foreach ($general->cur_curriculum as $c)
      @foreach ($c->course->times as $t)
        @if ($t->period->name == $p->name && $t->day->name == $d->name)
          <div class="d-flex justify-content-center cur_col_clear">
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
  CurChangeToWeekOrDay(this);
})()
function CurChangeToWeekOrDay(caller){
  var days = document.getElementsByClassName("cur_days_n"); 
  if (caller.id != "cur_header_week") {
    //代表點選星期
    document.getElementById("cur_header_day").setAttribute("hidden", "true");
    for (var i = 0, l = days.length; i < l; i++) {
      days[i].removeAttribute("hidden");
      days[i].classList.remove('col-12');
    }
    CurRemoveAllBg();
    document.getElementById("cur_header_day").parentNode.classList.add("bg-info");
  }
  else {
    var today = "cur_col_day" + (new Date().getDay());
    if (today == "cur_col_day0")
      today="cur_col_day1";
    CurChangeContextOfDays(today);
  }
}
function CurChangeContextOfDays(id)
{
  document.getElementById("cur_header_day").removeAttribute("hidden");

  var d_hidden = document.getElementsByClassName("cur_days_n"); 
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
  CurChangeTitleOfDays(id);
}
function CurChangeTitleOfDays(id)
{
  var highlight = document.getElementById(id);
  CurRemoveAllBg();
  highlight.parentNode.classList.add("bg-info");
}
function CurRemoveAllBg()
{
  var clear = document.getElementsByClassName("cur_col_clear");
  for (var i = 0, l = clear.length; i < l; i++) {
    clear[i].parentNode.classList.remove("bg-info");
  }
}
</script>
