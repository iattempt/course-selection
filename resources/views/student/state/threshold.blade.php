@extends ('student/state')
@section ('state')
  @include ('student/state/threshold/overview')
  <hr class="my-1">
  @include ('student/state/threshold/detail')
@endsection
