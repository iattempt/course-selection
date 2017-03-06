@extends('schema/preset')
@section('main')
<div class="container">
  <form action="classroom" method="get">
    <div class="form-group row">
      <label for="name_tw" class="col-2 col-form-label">Name (tw)</label>
      <div class="col-10">
        <input class="form-control"type="text" id="name_tw" placeholder="教室">
      </div>
    </div>
    <div class="form-group row">
      <label for="name_tw" class="col-2 col-form-label">Name (en)</label>
      <div class="col-10">
        <input class="form-control"type="text" id="name_tw" placeholder="Classroom">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
@endsection
