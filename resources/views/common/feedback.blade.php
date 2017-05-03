@extends ($general->identity)

@section ($general->identity)
<div class="container">
  <form action="feedback" method="post">
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
