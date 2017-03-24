@extends('schema/bootstrap_cdn')
<!DOCTYPE html>
<html lang='zh-tw'>
  <head>
    <meta charset="utf-8">
    <title>Cannot find page.</title>
    @section('bootstrap_cdn')
      @parent
    @endsection
    <style>
      .go-back {
          position: absolute ;
          left: 0px;
          top: 0px;
      }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body class="bd-docs container-fluid" data-spy="scroll" data-target=".bd-sidenav-active">
    <div class="row">
      <img src="{{asset('img/404.svg')}}" class="img-fluid mx-auto" alt="Error" />
      <div class="col-12"></div>
      <a class="go-back mx-auto btn btn-success" href="javascript:history.back()">Go Back</a>
    </div>
  </body>
</html>
