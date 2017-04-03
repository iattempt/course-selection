@extends('authority')
@section('authority')
<div class="container">
  <form action="{{ route('register') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group row d-flex justify-content-center">
      <div class="col-12 col-sm-8 col-md-6 row my-4">
        <h2>註冊</h2>
        <hr class="col-12">
        <input type="text" class="form-control my-2" name="name" value="{{ old('name') }}" placeholder="name" required autofocus>

        <input id="email" type="email" class="form-control my-2" name="email" value="{{ old('email') }}" placeholder="account@email.com" required>
        <input id="password" type="password" class="form-control my-2" name="password" placeholder="password" required>
        <input id="password-confirm" type="password" class="form-control my-2" name="password_confirmation" placeholder="password confirmation" required>
        <select id="type" class="form-control my-2" name="type" required>
          <option value="authority">Authority</option>
          <option value="professor">Professor</option>
          <option value="student">Student</option>
        </select>
        @if(isset($errors))
        @foreach($errors as $error)
        <div class="col-12 alert alert-danger" role="alert">
          {{$error}}
        </div>
        @endforeach
        @endif
        <hr class="col-12"></hr>
        <div class="col-12 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">
            註冊
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

