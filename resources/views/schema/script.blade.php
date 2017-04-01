@extends('schema/footer')
@section('script')

<script>

(function() {
    anchor = document.querySelectorAll('.nav-link,.dropdown-item');
    current = "http://iattempt.app" + window.location.pathname;
    for (var i = 0; i < anchor.length; i++) {
        if (anchor[i].href == current || anchor[i].href + "/" == current) {
            anchor[i].className += " active";
            anchor[i].className += " active";
        }
    }
})();

</script>

@endsection
