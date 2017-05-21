<form action="drop/{{$list->id}}" method="POST">
  @if ($loop->index%2 != 0)
  <li class="list-group-item row">
  @else
  <li class="list-group-item row bg-faded">
  @endif
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
    <button type="submit" class="col-2 col-md-1 btn btn-success">
      <span class="hidden-md-down">退選</span>
      <i class="glyphicon glyphicon-remove"></i>
    </button>

    <a class="col-3" data-toggle="collapse" href="#expand{{$list->id}}" aria-expanded="false">
      {{$list->name}}
      <span class="dropdown-toggle"></span>
    </a>

    <span class="col-3 col-md-2">
      @foreach ($list->professors as $p)
        <div>{{$p->user->name}}</div>
      @endforeach
    </span>

    <span class="col-2">
    <!--bug:非學生全部顯示為選修-->
      @if ($general->identity === "student")
        @php
        $output = "";
        if ($general->identity == "student")
          foreach ($list->types as $t)
            if ($t->unit->name == $general->info->student->unit->name)
              $output = $t->type->name;
        if ($output == "")
          foreach ($list->types as $t)
            if ($t->unit->name == "其餘")
              $output = $t->type->name;
        echo $output;
        @endphp
      @else
        @foreach ($list->types as $t)
          <div>{{$t->unit->name}}:{{$t->type->name}}</div>
        @endforeach
      @endif
    </span>

    <span class="col-1">
      @foreach ($list->times->sortBy('period') as $t)
        <div>{{$t->day->simple_name}}:{{$t->period->id}}</div>
      @endforeach
    </span>

    <span class="col-1 hidden-sm-down">
      {{$list->credit}}
    </span>

    <span class="col-1 hidden-sm-down">
      {{$list->classroom->name}}
    </span>
    <div class="collapse col-12" id="expand{{$list->id}}">
      <div class="card card-block">
        <div>課程代號: {{$list->id}}</div>
        <div>授課語言 : {{$list->language}}</div>
        <div>開課單位 : {{$list->unit->name}}</div>
        <div>開課學年-學期 : {{$list->year}}-{{$list->semester}}</div>
        <div>課程登記人數 : {{$list->enrollment_remain}}/{{$list->enrollment_max}}</div>
        <div class="hidden-md-up">學分 : {{$list->credit}}</div>
        <div class="hidden-md-up">教室 : {{$list->classroom->name}}</div>
        <a href="javascript:void(0)">課程大綱</a>
      </div>
    </div>

  </li>
</form>
