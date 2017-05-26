@extends ('student/state')
@section ('state')
  <div class="row">
  @include ('student/state/threshold/overview')
  </div>
  <hr class="my-1">
  <div class="row">
  @include ('student/state/threshold/detail')
  </div>
@endsection
