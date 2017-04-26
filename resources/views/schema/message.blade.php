@if ($general->message)
  @if ($general->message_type == 'success')
    <div class="alert alert-success">{{$general->message}}</div>
  @elseif ($general->message_type == 'danger')
    <div class="alert alert-danger">{{$general->message}}</div>
  @endif
@endif
