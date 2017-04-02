@extends('authority/modify')
@section('modify')
<div class="container">
  <form action="{{ route('register') }}" method="POST">
    {{ csrf_token() }}
    <div class="form-group row">
      <label for="series" class="col-2 col-form-label">Series</label>
      <div class="col-10">
        <input type="text" class="form-control" id="series">
      </div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-2 col-form-label">Name</label>
      <div class="col-10">
        <input type="text" class="form-control" id="name_tw" placeholder="王小明">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-2 col-form-label">Email address</label>
      <div class="col-10">
        <input type="email" class="form-control" id="email" aria-describedby="emailhelp" placeholder="account@email.com" value="{{old ('email') }}">
        <small id="emailhelp" class="form-text text-muted">we'll never share your email with anyone else.</small>
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-2 col-form-label">Password</label>
      <div class="col-10">
        <input type="password" class="form-control" id="password" name="passowrd" placeholder="password">
      </div>
    </div>
    <div class="form-group row">
      <label for="password_confirmation" class="col-2 col-form-label">Password</label>
      <div class="col-10">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="password">
      </div>
    </div>
    <div class="form-group row">
      <label for="type" class="col-2 col-form-label">Type</label>
      <div class="col-10">
        <textarea class="form-control" id="types" rows="3"></textarea>
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
