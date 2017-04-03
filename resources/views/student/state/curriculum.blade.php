@extends('student/state')
@section('state')

<div class="container">
  @if (isset($general->lists))
  @foreach ( $general->lists as $list)
    <div class="row">
      <a href="#">{{$list->course_id}}</a>
    </div>
  @endforeach
  @endif
</div>

@endsection
