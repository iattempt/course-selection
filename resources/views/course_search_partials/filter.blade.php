<div class="row">
  <a class="btn btn-primary col text-white href="#""> 
    <span class="glyphicon glyphicon-arrow-left"></span>
  </a>
  <a id="filter-controller" class="btn btn-primary col-7" data-toggle="collapse"  data-parent=""href="#filter" aria-expanded="false" aria-controls="filter">
    篩選器
    <span class="glyphicon glyphicon-triangle-bottom"></span>
  </a>
  <a class="btn btn-primary col text-white" href="#"> 
    <span class="glyphicon glyphicon-arrow-right"></span>
  </a>

  <div id="filter" class="collapse col-12">
    <!-- Filter options -->
    <form id="filter-form" action="course_search" method="GET">
      {{ csrf_field() }}
      <!-- button of options -->
      <div class="row d-flex justify-content-center">
        <a id="professor" class="btn col-" data-toggle="collapse" href="#collapseProfessor" aria-expanded="false" aria-controls="collapseProfessor">
          教授名字
          <span class="dropdown-toggle"></span>
        </a>

        <a id="course" class="btn col-" data-toggle="collapse" href="#collapseCourse" aria-expanded="false" aria-controls="collapseCourse">
          課程名稱
          <span class="dropdown-toggle"></span>
        </a>

        <a id="enroll" class="btn col-" data-toggle="collapse" href="#collapseState" aria-expanded="false" aria-controls="collapseState">
          可否加選
          <span class="dropdown-toggle"></span>
        </a>

        <a id="day" class="btn col-" data-toggle="collapse" href="#collapseDay" aria-expanded="false" aria-controls="collapseDay">
          星期
          <span class="dropdown-toggle"></span>
        </a>

        <a id="period" class="btn col-" data-toggle="collapse" href="#collapsePeriod" aria-expanded="false" aria-controls="collapsePeriod">
          時段
          <span class="dropdown-toggle"></span>
        </a>

        <a id="unit" class="btn col-" data-toggle="collapse" href="#collapseUnit" aria-expanded="false" aria-controls="collapseUnit">
          開設單位
          <span class="dropdown-toggle"></span>
        </a>

        <a id="credit" class="btn col-" data-toggle="collapse" href="#collapseCredit" aria-expanded="false" aria-controls="collapseCredit">
          學分數
          <span class="dropdown-toggle"></span>
        </a>

        <a id="language" class="btn col-" data-toggle="collapse" href="#collapseLanguage" aria-expanded="false" aria-controls="collapseLanguage">
          授課語言
          <span class="dropdown-toggle"></span>
        </a>

        <a id="mooc" class="btn col-" data-toggle="collapse" href="#collapseMooc" aria-expanded="false" aria-controls="collapseMooc">
          MOOC課程
          <span class="dropdown-toggle"></span>
        </a>

        <a id="year" class="btn col-" data-toggle="collapse" href="#collapseYear" aria-expanded="false" aria-controls="collapseYear">
          開課年度
          <span class="dropdown-toggle"></span>
        </a>

        <a id="semester" class="btn col-" data-toggle="collapse" href="#collapseSemester" aria-expanded="false" aria-controls="collapseSemester">
          開課學期
          <span class="dropdown-toggle"></span>
        </a>
        <!-- end button of options -->

        <!-- content of button -->
        <div class="collapse col-12 mx-auto" id="collapseProfessor">
          <div class="card card-block">
            <input class="form-control" type="search" value="" placeholder="教授名字" value="{{old('professorName')}}" name="{{old('professName')}}">
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseCourse">
          <div class="card card-block">
            <input id='courseName' class="form-control" type="search" placeholder="課程名稱" value="{{old('courseName')}}" name="courseName">
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseState">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('canEnroll')}}" name="canEnroll">
              可加選
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('canNotEnroll')}}" name="canNotEnroll">
              不可加選
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseDay">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('星期一')}}" name="星期一">
              星期一
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('星期二')}}" name="星期二">
              星期二
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('星期三')}}" name="星期三"> 
              星期三
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('星期四')}}" name="星期四">
              星期四
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('星期五')}}" name="星期五">
              星期五
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('星期六')}}" name="星期六">
              星期六
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapsePeriod">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第一節')}}" name="第一節">
              07:10-08:00 第一節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第二節')}}" name="第二節"> 
              08:10-09:00 第二節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第三節')}}" name="第三節">   
              09:10-10:00 第三節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第四節')}}" name="第四節">
              10:20-11:10 第四節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第五節')}}" name="第五節">
              11:20-12:10 第五節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第六節')}}" name="第六節">
              12:10-13:00 第六節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第七節')}}" name="第七節">
              13:10-14:00 第七節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第八節')}}" name="第八節">
              14:10-15:00 第八節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第九節')}}" name="第九節">
              15:20-16:10 第九節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第十節')}}" name="第十節">
              16:20-17:10 第十節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第十一節')}}" name="第十一節">
              17:20-18:10 第十一節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第十二節')}}" name="第十二節">
              18:20-18:10 第十二節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第十三節')}}" name="第十三節">
              19:20-20:10 第十三節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第十四節')}}" name="第十四節">
              20:20-21:10 第十四節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('第十五節')}}" name="第十五節">
              21:20-22:10 第十五節
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseUnit">
          <div class="card card-block">
            @foreach($general->units as $unit)
              @if ($unit->name == "其餘")
                @continue
              @else
              <label class="form-check-label">
                <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old($unit->name)}}" name="{{$unit->name}}">
                {{$unit->name}}
              </label>
              @endif
            @endforeach
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseCredit">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old($credit-2)}}" name="creadit-2">
                2學分
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old($credit-3)}}" name="creadit-3">
                3學分
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseLanguage">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('中文')}}" name="中文">
                中文
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('英文')}}" name="英文">
                英文
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseMooc">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('isMooc')}}" name="isMooc">
                是
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('isNotMooc')}}" name="isNotMooc">
                否
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseYear">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('year_2017')}}" name="year_2017">
              2017
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('year_2016')}}" name="year_2016">
              2016
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseSemester">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('semester_1')}}" name="semester_1">
              第一學期
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('semester_2')}}" name="semester_2">
              第二學期
            </label>
          </div>
        </div>
        <!-- end content of button -->
      </div>
      <a class="btn btn-success col" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('filter-form').submit();">
        <span class="glyphicon glyphicon-refresh"></span>
      </a>
    </form>
    <!-- end of Filter options-->
  </div>
</div>

<script>

function changeTriangle() {
  if (this.parentElement.parentElement.id != "filter-form")
    return;
  if (this.id=="filter-controller") {
    var span = this.children[0];
    if (span.classList[1] == "glyphicon-triangle-bottom") {
      span.classList.remove("glyphicon-triangle-bottom");
      span.classList.add("glyphicon-triangle-top");
    }
    else {
      span.classList.remove("glyphicon-triangle-top");
      span.classList.add("glyphicon-triangle-bottom");
    }
    return;
  }

  if (this.classList[this.classList.length-1] == "bg-faded") {
    this.classList.remove("dropup", "bg-faded");
    return ;
  }
  this.classList.add("dropup", "bg-faded");
}
var all_a = document.getElementsByTagName("a");
for (var i=0; i<all_a.length; i++) {
  all_a[i].addEventListener("click", changeTriangle, false);
}

</script>
