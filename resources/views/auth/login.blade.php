@extends ('schema.preset')

@section ('recaptcha-script')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section ('main')
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

          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : 'f1026109@thu.edu.tw' }}" required autofocus>

          <p>可以f1026109@thu.edu.tw登入，密碼為1234</p>
        </div>

        <div class="mx-auto form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="control-label">密碼</label>

          <input id="password" type="password" class="form-control" name="password" value="1234" required>
        </div>

        <div class="mx-auto form-group">
            <button
            class="g-recaptcha"
            data-sitekey="6Le-BSsUAAAAAKMWgFOyMtowyZMHqeOp6HD6PGCD"
            data-callback="recaptcha_callback">
            Submit
            </button>
            <button id="login" type="submit" class="btn btn-primary" disabled>
              登入
            </button>
          </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
    function recaptcha_callback(){
        alert("callback working");
        $('#login').prop("disabled", false);
    }
</script>
@endsection
