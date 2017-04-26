<form action="./" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="template" class="col-2 col-form-label">Template</label>
    <div class="col-10">
      <input type="text" name="name" autofocus>
    </div>
  </div>
  <div class="form-group">
    <input type="submit" value="送出">
  </div>
</form>
