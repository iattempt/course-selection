@extends('schema/preset')
@section('main')
<div class="container">
  <form action="/sign_in" method="post">
    <div class="form-group row">
      <label for="email" class="col-4 col-sm-2 col-form-label d-flex justify-content-center">Email</label>
      <div class="col-8 col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="account@example.com">
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-4 col-sm-2 col-form-label d-flex justify-content-center">Password</label>
      <div class="col-8 col-sm-10">
        <input type="password" class="form-control" id="password">
      </div>
    </div>
    <div class="form-group row">
      <div class="input-group col-12 d-flex justify-content-end">
        <span class="input-group-addon">
          <input type="checkbox" aria-label="Checkbox for following text input">
        </span>
        <span class="input-group-addon">Remember me</span>
        <a href="/sign_in" class="btn btn-primary">
          Sign in
        </a>
      </div>
    </div>
  </form>
</div>
@endsection
