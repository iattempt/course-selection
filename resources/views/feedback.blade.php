@extends('schema/preset')
@section('main')
<div class="container">
  <form action="feedback" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name">
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="account@example.com">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" class="form-control" id="subject">
    </div>
    <div class="form-group">
      <label for="exampleTextarea">How can we help</label>
      <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Please describe exactly what you're trying to accomplish."></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
