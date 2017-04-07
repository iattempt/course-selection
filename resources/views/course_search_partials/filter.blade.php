<div class="row">
  <a id="filter-controller" class="btn btn-primary col-12" data-toggle="collapse"  data-parent=""href="#filter" aria-expanded="false" aria-controls="filter">
    篩選器
  </a>
  <div id="filter" class="collapse col-12">
    <!-- Filter options -->
    <form id="filter-form" action="course_search" method="GET">
      {{ csrf_field() }}
      <!-- button of options -->
      <div class="row mx-auto">
        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseProfessor" aria-expanded="false" aria-controls="collapseProfessor">
          教授名字
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseCourse" aria-expanded="false" aria-controls="collapseCourse">
          課程名稱
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseState" aria-expanded="false" aria-controls="collapseState">
          可加選
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseDay" aria-expanded="false" aria-controls="collapseDay">
          星期
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapsePeriod" aria-expanded="false" aria-controls="collapsePeriod">
          時段
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseUnit" aria-expanded="false" aria-controls="collapseUnit">
          開設單位
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseCredit" aria-expanded="false" aria-controls="collapseCredit">
          學分數
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseLanguage" aria-expanded="false" aria-controls="collapseLanguage">
          授課語言
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseMooc" aria-expanded="false" aria-controls="collapseMooc">
          MOOC課程
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseYear" aria-expanded="false" aria-controls="collapseYear">
          開課年度
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn col-sm-4 col-md-3 col-lg-2 col-xl-1" data-toggle="collapse" href="#collapseSemester" aria-expanded="false" aria-controls="collapseSemester">
          開課學期
          <span class="dropdown-toggle"></span>
        </a>

        <a class="btn btn-success col-sm-4 col-md-3 col-lg-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('filter-form').submit();">篩選</a>
        <!-- end button of options -->

        <!-- content of button -->
        <div class="collapse col-12 mx-auto" id="collapseProfessor">
          <div class="card card-block mx-auto">
            <input class="form-control" type="search" value="" placeholder="教授名字">
          </div>
        </div>
        <div class="collapse col-12 mx-auto" id="collapseCourse">
          <div class="card card-block">
            <input class="form-control" type="search" value="" placeholder="課程名稱">
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseState">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optionsRadios" value="can" checked>
              可加選
            </label>
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optionsRadios" value="cannot">
              不可加選
            </label>
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optionsRadios" value="both">
              皆可
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
              第一節 07:10-08:00
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第二節 08:10-09:00
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第三節 09:10-10:00
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第四節 10:20-11:10
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第五節 11:20-12:10
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第六節 12:10-13:00
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第七節 13:10-14:00
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第八節 14:10-15:00
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第九節 15:20-16:10
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第十節 16:20-17:10
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第十一節 17:20-18:10
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第十二節 18:20-18:10
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第十三節 19:20-20:10
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第十四節 20:20-21:10
            </label>
            <label class="form-check-label">
              <input type="checkbox" class="my-3 my-lg-2 form-check-input">
              第十五節 21:20-22:10
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseUnit">
          <div class="card card-block">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
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
              <input type="radio" class="form-check-input" name="optionsRadios" value="can" checked>
              2017
            </label>
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optionsRadios" value="can" checked>
              2016
            </label>
          </div>
        </div>

        <div class="collapse col-12 mx-auto" id="collapseSemester">
          <div class="card card-block">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optionsRadios" value="can" checked>
              第一學期
            </label>
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optionsRadios" value="can" checked>
              第二學期
            </label>
          </div>
        </div>
        <!-- end content of button -->
      </div>
    </form>
    <!-- end of Filter options-->
  </div>
</div>

<script>
function changeTriangle() {
  if (this.classList[this.classList.length-1] == "dropup") {
    this.classList.remove("dropup");
    return ;
  }
  this.classList.add("dropup");
}
var all_a = document.getElementsByTagName("a");
for (var i=0; i<all_a.length; i++) {
  all_a[i].addEventListener("click", changeTriangle, false);
}
</script>
