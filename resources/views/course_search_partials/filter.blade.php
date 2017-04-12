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
        <a class="btn col-" data-toggle="collapse" href="#collapseProfessor" aria-expanded="false" aria-controls="collapseProfessor">
          教授名字
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapseCourse" aria-expanded="false" aria-controls="collapseCourse">
          課程名稱
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapseState" aria-expanded="false" aria-controls="collapseState">
          可加選
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapseDay" aria-expanded="false" aria-controls="collapseDay">
          星期
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapsePeriod" aria-expanded="false" aria-controls="collapsePeriod">
          時段
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapseUnit" aria-expanded="false" aria-controls="collapseUnit">
          開設單位
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapseCredit" aria-expanded="false" aria-controls="collapseCredit">
          學分數
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapseLanguage" aria-expanded="false" aria-controls="collapseLanguage">
          授課語言
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapseMooc" aria-expanded="false" aria-controls="collapseMooc">
          MOOC課程
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapseYear" aria-expanded="false" aria-controls="collapseYear">
          開課年度
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-" data-toggle="collapse" href="#collapseSemester" aria-expanded="false" aria-controls="collapseSemester">
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
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              星期一
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              星期二
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              星期三
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              星期四
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              星期五
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              星期六
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapsePeriod">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              07:10-08:00 第一節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              08:10-09:00 第二節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              09:10-10:00 第三節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              10:20-11:10 第四節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              11:20-12:10 第五節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              12:10-13:00 第六節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              13:10-14:00 第七節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              14:10-15:00 第八節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              15:20-16:10 第九節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              16:20-17:10 第十節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              17:20-18:10 第十一節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              18:20-18:10 第十二節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              19:20-20:10 第十三節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              20:20-21:10 第十四節
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
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
                <input type="checkbox" class="my-3 my-lg-2 form-check-input">
                {{$unit->name}}
              </label>
              @endif
            @endforeach
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseCredit">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
                2學分
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
                3學分
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseLanguage">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
                中文
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
                英文
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
                日文
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseMooc">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
                是
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
                否
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseYear">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              2017
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              2016
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseSemester">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第一學期
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
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
