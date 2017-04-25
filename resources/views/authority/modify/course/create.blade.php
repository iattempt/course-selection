<a class="btn btn-primary" data-toggle="collapse" href="#collapseCreate" aria-expanded="false" aria-controls="collapseCreate">新增</a>
<div id="collapseCreate" class="collapse">
  <form action="course" method="post">
    <div class="form-group row">
      <label for="course_base" class="col-2 col-form-label">Course-base</label>
      <div class="col-10">
        <select class="form-control" id="course_base">
          <!--需要搜尋資料庫資料-->
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="classroom" class="col-2 col-form-label">Classroom</label>
      <div class="col-10">
        <select class="form-control" id="classroom">
          <!--需要搜尋資料庫資料-->
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="topic" class="col-2 col-form-label">Topic</label>
      <div class="col-10">
        <input type="text" class="form-control" id="topic"></input>
      </div>
    </div>
    <div class="form-group row">
      <label for="year" class="col-2 col-form-label">Year</label>
      <div class="col-10">
        <select class="form-control" id="year">
          <!--需要改為偵測本年度 特別小心下學期的年度是去年-->
          <option>2017</option>
          <option>2018</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="semester" class="col-2 col-form-label">Semester</label>
      <div class="col-10">
        <select class="form-control" id="semester">
          <option>1</option>
          <option>2</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
