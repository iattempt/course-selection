@extends ('schema.preset')

@section ('main')
    <p>
        <h2>404. 錯誤</h2> 將於3秒後轉回首頁
    </p>
    <hr>
    <p>不好意思，您查詢的頁面可能已經移除、重新命名或者暫時無法使用</p>
    <p>請嘗試回<a href="/">首頁</a>，再次查詢您欲索取的資訊連結</p>
@endsection

<script>
var delay = 3000; 
setTimeout(function(){ window.location = '/'; }, delay);
</script>
