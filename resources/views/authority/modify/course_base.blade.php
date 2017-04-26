@extends('authority/modify')
@section('modify')
<div class="container">
  <a class="btn btn-primary" href="course_base/create">新增</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>課程基底代號</th>
        <th>課程基底名稱</th>
        <th colspan="3">異動</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($general->lists as $list)
        <tr>
          <td>{{$list->id}}</td>
          <td>{{$list->name}}</td>
          <td><a class="btn btn-primary" href="course_base/{{$list->id}}">檢視</a></td>
          <td><a class="btn btn-primary" href="course_base/{{$list->id}}/edit">修改</a></td>
          <td>
            @include ('authority/modify/delete', array('modify_for' => 'course_base'))
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
