<div class="row">
  <a id="filter-controller" class="btn btn-primary col-12" data-toggle="collapse"  data-parent="" href="#filter" aria-expanded="false" aria-controls="filter">
    篩選器
    <span class="glyphicon glyphicon-triangle-bottom"></span>
  </a>

  <div id="filter" class="collapse col-12">
    <!-- Filter options -->
    <form id="filter-form" action="course_search" role="form" method="GET">
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
          人數狀況
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

        <a id="language" class="btn col-" data-toggle="collapse" href="#collapseLanguage" aria-expanded="false" aria-controls="collapseLanguage">
          授課語言
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
              <input type="radio" class="my-3 my-lg-2 form-check-input" value="1" name="enroll" {{(old('enroll') === '1') ? 'checked' : ''}}>
              可加選
            </label>
            <label class="form-check-label">
              <input type="radio" class="my-3 my-lg-2 form-check-input" value="0" name="enroll" {{(old('enroll') === '0') ? 'checked' : ''}}>
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
                @if (old('type'))
                  @foreach (old('type') as $value)
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
          <div class="card card-block">
            <div class="row">
              <div class="col d-flex justify-content-center"></div>
              @foreach ($general->days as $d)
              <div class="col d-flex justify-content-center">{{$d->name}}</div>
              @if (!$loop->last)|@endif
              @endforeach
            </div>
            @foreach ($general->periods as $p)
            @if ($loop->index%2 === 0)
            <div class="row">
            @else
            <div class="row bg-info">
            @endif
              <div class="col">{{$p->name}}</div>
              @foreach ($general->days as $d)
              <div class="col">
                <label class="form-check-label d-flex justify-content-center">
                  <input type="checkbox" class"form-check-input" value="{{$d->name}} {{$p->name}}" name="time[]"
                    @if (old('time'))
                      @foreach (old('time') as $value)
                        @if ($value === ($d->name." ".$p->name))
                          checked
                        @endif
                      @endforeach
                    @endif
                    >
                </label>
              </div>
              @if (!$loop->last)|@endif
              @endforeach
            </div>
            @endforeach
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
                    @if (old('unit'))
                      @foreach (old('unit') as $value)
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
                    @if (old('language'))
                      @foreach (old('language') as $value)
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
                    @if (old('language'))
                      @foreach (old('language') as $value)
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
            <label class="form-check-label">
            <input type="radio" class="my-3 my-lg-2 form-check-input" value="2017 1" name="semester" {{old('semester')!='2016_2' ?: 'checked'}}>
              2017-1
            </label>
            <label class="form-check-label">
              <input type="radio" class="my-3 my-lg-2 form-check-input" value="2016 2" name="semester" {{old('semester')!='2016_2' ?: 'checked'}}>
              2016-2
            </label>
            <label class="form-check-label">
              <input type="radio" class="my-3 my-lg-2 form-check-input" value="2016 1" name="semester" {{old('semester')!='2016_1' ?: 'checked'}}>
              2016-1
            </label>
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
  if (this.id == "filter-controller") {
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
