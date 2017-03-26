@extends('authority/modify')
@section('modify')
<div class="container">
  <form action="student" method="post">
    <div class="form-group row">
      <label for="series" class="col-2 col-form-label">Series</label>
      <div class="col-10">
        <input type="text" class="form-control" id="series">
      </div>
    </div>
    <div class="form-group row">
      <label for="name_tw" class="col-2 col-form-label">Name (tw)</label>
      <div class="col-10">
        <input type="text" class="form-control" id="name_tw" placeholder="王小明">
      </div>
    </div>
    <div class="form-group row">
      <label for="name_en" class="col-2 col-form-label">Name (en)</label>
      <div class="col-10">
        <input type="text" class="form-control" id="name_en" placeholder="ming wang">
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-2 col-form-label">Password</label>
      <div class="col-10">
        <input type="password" class="form-control" id="password" placeholder="password">
      </div>
    </div>
    <div class="form-group row">
      <label for="grade" class="col-2 col-form-label">Grade</label>
      <div class="col-10">
        <select class="form-control" id="grade">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="state" class="col-2 col-form-label">State</label>
      <div class="col-10">
        <select class="form-control" id="state">
          <option>在學</option>
          <option>休學</option>
          <option>畢業</option>
          <option>肄業</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="unit_id" class="col-2 col-form-label">Unit</label>
      <div class="col-10">
        <select class="form-control" id="unit_id">
          <!--需要搜尋資料庫資料-->
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
@endsection
