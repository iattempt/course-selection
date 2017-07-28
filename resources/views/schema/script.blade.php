@extends('schema/footer')
@section('script')

<script>
</script>

<!--google analytics-->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-99859812-1', 'auto');
ga('send', 'pageview');

</script>

<!-- append highlight to navs -->
<script>
$(document).ready(function() {
    full_path = window.location.href;
    if (full_path == "{!! env('APP_URL') !!}/student"
        || full_path == "{!! env('APP_URL') !!}/admin") {
        $('#home').addClass('active');
    } else {
        $('.highlight-nav').each(function(index, elem) {
            if (full_path.match(elem.href))
                $(elem).addClass('active');
        });
        // except home and breackcrumbs
        $('#home').removeClass('active');
        $('.breackcrumb').removeClass('active');
    }
});
</script>
@endsection
