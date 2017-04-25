<form action="./" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="template" class="col-2 col-form-label">Template</label>
    <div class="col-10">
      <select class="form-control" id="template">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <input type="submit" value="送出">
  </div>
</form>
