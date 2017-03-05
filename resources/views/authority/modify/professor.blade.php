@extends('schema/preset')
@section('main')
<div class="container">
  <form action="professor" method="post">
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
      <label for="email" class="col-2 col-form-label">Email address</label>
      <div class="col-10">
        <input type="email" class="form-control" id="email" aria-describedby="emailhelp" placeholder="enter email">
        <small id="emailhelp" class="form-text text-muted">we'll never share your email with anyone else.</small>
      </div>
    </div>
    <div class="form-group row">
      <label for="skills" class="col-2 col-form-label">Skills</label>
      <div class="col-10">
        <textarea class="form-control" id="skills" rows="3"></textarea>
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
