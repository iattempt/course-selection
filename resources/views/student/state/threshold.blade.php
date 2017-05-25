@extends ('student/state')
@section ('state')
  @include ('student/state/threshold/total')
  <hr class="my-1">
  @include ('student/state/threshold/force')
  <hr class="my-1">
  @include ('student/state/threshold/elective')
@endsection
