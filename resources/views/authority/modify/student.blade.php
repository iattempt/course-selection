@extends('authority/modify')
@section('modify')
<div class="container">
  @foreach ($general->lists as $list)
    {{$list->name}}
  @endforeach
</div>
@endsection
