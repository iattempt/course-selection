@extends('authority/modify')
@section('modify')
<div class="container">
  <form action="threshold" method="post">
    <div class="form-group row">
      <label for="unit" class="col-2 col-form-label">Unit</label>
      <div class="col-10">
        <select class="form-control" id="unit">
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
      <label for="course_base" class="col-2 col-form-label">Course base</label>
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
      <label for="default_grade" class="col-2 col-form-label">Default grade</label>
      <div class="col-10">
        <select class="form-control" id="default_grade">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="default_semester" class="col-2 col-form-label">Default semester</label>
      <div class="col-10">
        <select class="form-control" id="default_semester">
          <option>1</option>
          <option>2</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
@endsection
