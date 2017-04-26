<a class="btn btn-primary" href="course_base/create">新增</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>教室代號</th>
      <th>教室名稱</th>
      <th>異動</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($general->lists as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td><a href="course_base/{{$list->id}}">{{$list->name}}</a></td>
        <td>
          <a class="btn btn-primary" href="course_base/{{$list->id}}/edit">修改</a>
        </td>
        <td>
          @include ($general->view_path . '/delete')
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
