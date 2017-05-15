@extends ($general->identity)

@section ($general->identity)
<div class="container">
  <form action="feedback" method="post">   
    {{ csrf_field() }}
    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" class="form-control" id="subject" name="subject" required>
    </div>
    <div class="form-group">
      <label for="context">How can we help</label>
      <textarea class="form-control" id="context" rows="3" placeholder="Please describe exactly what you're trying to accomplish." name="context" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
