@extends('authority/modify')
@section('modify')
<div class="container">
  <form action="course_base" method="post">
    <div class="form-group row">
      <label for="name_tw" class="col-2 col-form-label">Name (tw)</label>
      <div class="col-10">
        <input class="form-control"type="text" id="name_tw" placeholder="課程">
      </div>
    </div>
    <div class="form-group row">
      <label for="name_tw" class="col-2 col-form-label">Name (en)</label>
      <div class="col-10">
        <input class="form-control"type="text" id="name_tw" placeholder="Course base">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
@endsection
