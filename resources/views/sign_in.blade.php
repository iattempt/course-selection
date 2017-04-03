@extends('schema/preset')
@section('main')
<div class="container">
  <form action="{{ route('login') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group row d-flex justify-content-center">
      <div class="col-12 col-sm-8 col-md-6 row my-4">
        <h2>登入</h2>
        <hr class="col-12">
        <input type="email" class="form-control" autofocus name="email" placeholder="account@email.com">
        <input type="password" class="form-control my-2" name="password" placeholder="password">
        @if(isset($errors))
        @foreach($errors as $error)
        <div class="col-12 alert alert-danger" role="alert">
          {{$error}}
        </div>
        @endforeach
        @endif
        <a href="{{ route('password.request') }}">忘記密碼?</a>
        <hr class="col-12">
        <div class="input-group d-flex justify-content-end">
          <span class="input-group-addon">
            <input type="checkbox" aria-label="Checkbox for following text input">
          </span>
          <span class="input-group-addon">記住登入資訊</span>
          <input type="submit" class="btn btn-primary" value="Sign in">
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
