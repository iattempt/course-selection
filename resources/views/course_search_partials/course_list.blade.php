@foreach ($general->lists as $list)
  @if ($loop->index%2 != 0)
  <li class="list-group-item row">
  @else
  <li class="list-group-item row bg-faded">
  @endif
    <span class="col-4">
      <a class="" data-toggle="collapse" href="#expand{{$list->id}}" aria-expanded="false">
      {{$list->name}}
      </a>
    </span>

    <span class="col-3">
    @foreach ($list->professors as $p)
      {{$p->user->name}}&nbsp;
    @endforeach
    </span>

    <span class="col-1">
      @php
      $output = "";
      foreach ($list->types as $t)
        if ($t->unit->name == $general->info->student->unit->name)
          $output = $t->type->name;
      if ($output == "")
        foreach ($list->types as $t)
          if ($t->unit->name == "其餘")
            $output = $t->type->name;
      echo $output;
      @endphp
    </span>

    <span class="col">
      @foreach ($list->time->sortBy('period') as $t)
        <div>{{$t->day->name}} {{$t->period->name}}</div>
      @endforeach
    </span>

    <span class="col-1 hidden-sm-down">
      {{$list->credit}}
    </span>

    <span class="col-1 hidden-sm-down">
      {{$list->classroom->name}}
    </span>
  <!--
  @if ($general->identity === "student")
    <span class="col">
      <label class="custom-condivol custom-checkbox">
        <input type="checkbox" class="custom-condivol-input">
      </label>
    </span>
  @endif
  -->
  <div class="collapse col-12" id="expand{{$list->id}}">
    <div class="card card-block">
      @if ($general->info->type == "student")
        <div><a href="#">加選</a></div>
      @endif
      <div>授課語言 : {{$list->language}}</div>
      <div>MOOC : {{$list->mooc==1 ? "是"  :  "否"}}</div>
      <div>開課學年-學期 : {{$list->year}}-{{$list->semester}}</div>
      <div>課程剩餘人數 : {{$list->enrollment_remain}}/{{$list->enrollment_max}}</div>
      <div class="hidden-md-up">學分 : {{$list->credit}}</div>
      <div class="hidden-md-up">教室 : {{$list->classroom->name}}</div>
    </div>
  </div>

  </li>
@endforeach
