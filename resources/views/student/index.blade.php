@extends ('student')
@section ('student')
<div class="mx-5">
  <table class="table table-sm table-bordered">
    <thead>
      <tr>
        <td>姓名</td>
        <td>電子郵件</td>
        <td>身份</td>
        <td>求學狀態</td>
        <td>入學學年度</td>
        <td>所屬系級</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $general->info->name }}</td>
        <td>{{ $general->info->email }}</td>
        <td>{{ $general->info->type }}</td>
        <td>{{ $general->info->student->state }}</td>
        <td>{{ $general->info->student->year }}</td>
        <td>{{ $general->info->student->unit->name }}</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
