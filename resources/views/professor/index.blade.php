@extends ('professor')

@section ('professor')
<div class="mx-5">
  <table class="table table-sm table-bordered">
    <thead>
      <tr>
        <td>姓名</td>
        <td>電子郵件</td>
        <td>身份</td>
        <td>職稱</td>
        <td>隸屬單位</td>
        <td>專長</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $general->info->name }}</td>
        <td>{{ $general->info->email }}</td>
        <td>{{ $general->info->type }}</td>
        <td>{{ $general->info->professor->title }}</td>
        <td>{{ $general->info->professor->unit->name }}</td>
        <td>{{ $general->info->professor->skills }}</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
