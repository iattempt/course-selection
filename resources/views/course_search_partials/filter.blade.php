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

        <a id="type" class="btn col-" data-toggle="collapse" href="#collapseType" aria-expanded="false" aria-controls="collapseType">
          修別
          <span class="dropdown-toggle"></span>
        </a>

        <a id="time" class="btn col-" data-toggle="collapse" href="#collapseTime" aria-expanded="false" aria-controls="collapseTime">
          時段
          <span class="dropdown-toggle"></span>
        </a>

        <a id="unit" class="btn col-" data-toggle="collapse" href="#collapseUnit" aria-expanded="false" aria-controls="collapseUnit">
          開課單位
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
            <input id='professorName' class="form-control" type="search" placeholder="教授名字" value="{{old('professorName')}}" name="professorName">
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

        <div class="collapse col-12 mx-auto" id="collapseType">
          <div class="card card-block">
            @foreach ($general->types as $t)
            <label class="form-check-label">
              <input type="checkbox" class"my-3 my-lg-2 form-check-input" value="{{old($t->name)}}" name="{{$t->name}}">
              {{$t->name}}
            </label>
            @endforeach
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseDay">
          <div class="card card-block">
            @foreach ($general->days as $d)
            <label class="form-check-label">
              <input type="checkbox" class"my-3 my-lg-2 form-check-input" value="{{old($d->name)}}" name="{{$d->name}}">
              {{$d->name}}
            </label>
            @endforeach
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseTime">
          <div class="card card-block">
            @foreach ($general->periods as $p)
              @if ($loop->index%2==0)
              <div class="row">
              @else
              <div class="row bg-faded">
              @endif
              @foreach ($general->days as $d)
              <label class="col form-check-label">
                <input type="checkbox" class"my-3 my-lg-2 form-check-input" value="{{old($d->name)}}{{old($p->name)}}" name="{{$d->name}}{{$p->name}}">
                {{$d->name}}＊{{$p->name}}
              </label>
              @endforeach
              <div class="col-12"></div>
            </div>
            @endforeach
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
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('creadit-2')}}" name="creadit-2">
                2學分
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{old('credit-2')}}" name="creadit-3">
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
  if (this.parentElement.parentElement.id != "filter-form")
    return;

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
