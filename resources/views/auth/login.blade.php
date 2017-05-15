@extends('schema.preset')

@section('main')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-md-8 mx-auto">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            @if ($errors->has('email') | ($errors->has('password')))
              <div class="alert alert-danger">
                <strong>帳號密碼錯誤!</strong>
              </div>
            @endif
            <div class="mx-auto form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="control-label">電子郵件位址</label>

              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mx-auto form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="control-label">密碼</label>

              <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="mx-auto form-group">
                <button type="submit" class="btn btn-primary">
                  登入
                </button>
              </div>
          </form>
    </div>
  </div>
</div>
@endsection
