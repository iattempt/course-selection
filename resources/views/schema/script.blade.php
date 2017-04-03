@extends('schema/footer')
@section('script')

<script>
//append classname:active to nav
(function() {
  anchor = document.querySelectorAll('.nav-link,.dropdown-item');
  current = "http://iattempt.app" + window.location.pathname;
  for (var i = 0; i < anchor.length; i++) {
    if (anchor[i].href == current || anchor[i].href + "/" == current) {
      anchor[i].className += " active";
      //if node is dropdown item then dropdown menu's name is also set active
      for (var j = 0; j < anchor[i].classList.length; j++)
        if (anchor[i].classList[j] =="dropdown-item")
          anchor[i].parentElement.parentElement.className += " active";
    }
  }
})();

</script>

@endsection
