@extends ('authority')

@section ('authority')
@if ($general->info->name == 'admin')
  <a class="btn btn-primary" href="authority/migrate">確定選課</a>
@endif
@endsection
