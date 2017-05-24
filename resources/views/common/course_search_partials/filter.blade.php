<div class="row">
  <a id="filter-controller" class="btn btn-primary col-12" data-toggle="collapse"  data-parent="" href="#filter" aria-expanded="false" aria-controls="filter">
    篩選器
  </a>

  <div id="filter" class="collapse col-12">
    <!-- Filter options -->
    <form id="filter-form" action="course_search" role="form" method="GET">
      {{ csrf_field() }}
      <!-- button of options -->
      <div class="row d-flex justify-content-center">
        <a id="professor" class="btn col-6 col-sm-4 col-md-2 col-lg-1" data-toggle="collapse" href="#collapseProfessor" aria-expanded="false" aria-controls="collapseProfessor">
          教授名字
          <span class="dropdown-toggle"></span>
        </a>

        <a id="course" class="btn col-6 col-sm-4 col-md-2 col-lg-1" data-toggle="collapse" href="#collapseCourse" aria-expanded="false" aria-controls="collapseCourse">
          課程名稱
          <span class="dropdown-toggle"></span>
        </a>

        <a id="enroll" class="btn col-6 col-sm-4 col-md-2 col-lg-1" data-toggle="collapse" href="#collapseState" aria-expanded="false" aria-controls="collapseState">
          人數狀況
          <span class="dropdown-toggle"></span>
        </a>

        <a id="type" class="btn col-6 col-sm-4 col-md-2 col-lg-1" data-toggle="collapse" href="#collapseType" aria-expanded="false" aria-controls="collapseType">
          修別
          <span class="dropdown-toggle"></span>
        </a>

        <a id="time" class="btn col-6 col-sm-4 col-md-2 col-lg-1" data-toggle="collapse" href="#collapseTime" aria-expanded="false" aria-controls="collapseTime">
          時段
          <span class="dropdown-toggle"></span>
        </a>

        <a id="unit" class="btn col-6 col-sm-4 col-md-2 col-lg-1" data-toggle="collapse" href="#collapseUnit" aria-expanded="false" aria-controls="collapseUnit">
          開課單位
          <span class="dropdown-toggle"></span>
        </a>

        <a id="language" class="btn col-6 col-sm-4 col-md-2 col-lg-1" data-toggle="collapse" href="#collapseLanguage" aria-expanded="false" aria-controls="collapseLanguage">
          授課語言
          <span class="dropdown-toggle"></span>
        </a>

        <a id="semester" class="btn col-6 col-sm-4 col-md-2 col-lg-1" data-toggle="collapse" href="#collapseSemester" aria-expanded="false" aria-controls="collapseSemester">
          開課學期
          <span class="dropdown-toggle"></span>
        </a>
        <!-- end button of options -->

        <!-- content of button -->
        <div class="collapse col-12 mx-auto" id="collapseProfessor">
          <div class="card card-block">
            <input id="professorName" class="form-control" type="search" placeholder="教授名字" value="{{old("professorName")}}" name="professorName">
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseCourse">
          <div class="card card-block">
            <input id="courseName" class="form-control" type="search" placeholder="課程名稱" value="{{old("courseName")}}" name="courseName">
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseState">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="radio" class="my-3 my-lg-2 form-check-input" value="1" name="enroll" {{(old("enroll") === "1") ? "checked" : ""}}>
              可加選
            </label>
            <label class="form-check-label">
              <input type="radio" class="my-3 my-lg-2 form-check-input" value="0" name="enroll" {{(old("enroll") === "0") ? "checked" : ""}}>
              不可加選
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseType">
          <div class="card card-block">
            <!-- 列出資料庫修別選項 -->
            @foreach ($general->types as $t)
            <label class="form-check-label">
              <input type="checkbox" class"my-3 my-lg-2 form-check-input" value="{{$t->name}}" name="type[]"
                @if (old("type"))
                  @foreach (old("type") as $value)
                    @if ($value === $t->name)
                      checked
                    @endif
                  @endforeach
                @endif
                >
              {{$t->name}}
            </label>
            @endforeach
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseTime">
          <div class="card">
            <div class="row">
            @foreach ($general->days as $day)
              <div class="col-4 col-md-2">
              @foreach ($general->periods as $period)
                <div class="row">
                  <label class="col-12 form-check-label my-2">
                    <input type="checkbox" class"form-check-input" value="{{$day->name}} {{$period->name}}" name="time[]"
                      @if (old("time"))
                        @foreach (old("time") as $value)
                          @if ($value === ($day->name." ".$period->name))
                            checked
                          @endif
                        @endforeach
                      @endif
                      >
                    {{$day->simple_name}}:{{$period->id}}
                  </label>
                </div>
              @endforeach
              <hr class="my-2 my-lg-0">
              </div>
            @endforeach
            </div>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseUnit">
          <div class="card card-block">
            @foreach($general->units as $u)
              @if ($u->name === "其餘")
                @continue
              @else
                <label class="form-check-label">
                  <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="{{$u->name}}" name="unit[]"
                    @if (old("unit"))
                      @foreach (old("unit") as $value)
                        @if ($value === $u->name)
                          checked
                        @endif
                      @endforeach
                    @endif
                    >
                  {{$u->name}}
                </label>
              @endif
            @endforeach
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseLanguage">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="中文" name="language[]"
                    @if (old("language"))
                      @foreach (old("language") as $value)
                        @if ($value === "中文")
                          checked
                        @endif
                      @endforeach
                    @endif
                    >
                中文
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input" value="英文" name="language[]"
                    @if (old("language"))
                      @foreach (old("language") as $value)
                        @if ($value === "英文")
                          checked
                        @endif
                      @endforeach
                    @endif
                    >
                英文
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseSemester">
          <div class="card card-block">
            @for ($y = 2016; $y<=date("Y"); $y++)
              @for ($s = 1; $s<=2; $s++)
                <label class="form-check-label">
                  <input type="radio" class="my-3 my-lg-2 form-check-input" value="{{$y}} {{$s}}" name="semester" 
                    {{old("semester")=="$y $s" ? "checked" : ""}} 
                    {{!old("semester") && env("CURRENT_YEAR") == $y && env("CURRENT_SEMESTER") == $s ?"checked":""}}
    >
                  {{$y}}-{{$s}}
                </label>
              @endfor
            @endfor
          </div>
        </div>

        <!-- end content of button -->
      </div>
      <div class="col-12 d-flex justify-content-center">
        <label class="form-check-label mb-2">
          <input type="checkbox" class="mt-3 form-check-input" value="yes" name="flash">
            保留搜尋條件
        </label>
        &nbsp;&nbsp;&nbsp;
        <input type="submit" value="送出" class="btn btn-success">
      </div>
    </form>
    <!-- end of Filter options-->
  </div>
  
  <div class="alert alert-info col-12" role="alert">
    <strong>搜尋完畢，共有{{ count($general->lists) }}筆資料</strong>
    &nbsp;&nbsp;條件為：{{ $general->request_lists ? $general->request_lists :"未設定"}}
  </div>
</div>
<script>

function changeTriangle() {
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
