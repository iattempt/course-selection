@extends ('layouts.app')

@section ('recaptcha-script')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section ('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">註冊</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">名字</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">密碼</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">

              <label for="password-confirm" class="col-md-4 control-label">確認密碼</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>

            <div class="form-group">
              <label for="type" class="col-md-4 control-label">身份</label>
              <div class="col-md-6">
                <select class="form-control" name="type">
                  <option value="authority">Authority</option>
                  <option value="professor">Professor</option>
                  <option value="student">Student</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button
                class="g-recaptcha"
                data-sitekey="6Le-BSsUAAAAAKMWgFOyMtowyZMHqeOp6HD6PGCD"
                data-callback="recaptcha_callback">
                Submit
                </button>
                <button id="register" type="submit" class="btn btn-primary">
                  註冊
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function recaptcha_callback(){
        alert("callback working");
        $('#register').prop("disabled", false);
    }
</script>
@endsection
