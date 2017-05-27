@if ($loop->index%2 != 0)
<li class="list-group-item row">
@else
<li class="list-group-item row bg-faded">
@endif
  <span class="col-2 col-md-1">
    @php
      $isEnrolled = false;
      foreach($general->pre_curriculum as $c)
        if ($c->course_id === $list->id) 
          $isEnrolled = true;
      if (!$isEnrolled && $list->enrollment_remain>0 && $list->year == env("CURRENT_YEAR") && $list->semester == env("CURRENT_SEMESTER"))
        echo '<label class="form-control-label" for="enroll'.
              $list->id .
              '"></label><input id="enroll'.
              $list->id.
              '" type="checkbox" value="'.
              $list->id.
              '" name="reg_enroll[]">';
    @endphp
  </span>
  <span class="col-3">
    <a data-toggle="collapse" href="#expand{{$list->id}}" aria-expanded="false">
      {{$list->name}}
      <span class="dropdown-toggle"></span>
    </a>
  </span>

  <span class="col-3 col-md-2">
  @foreach ($list->professors as $p)
    @if ($p->user)
    <div>{{$p->user->name}}</div>
    @endif
  @endforeach
  </span>

  <span class="col-2">
  <!--bug:非學生全部顯示為選修-->
    @if ($general->identity === "student")
      @php
      $output = "";
      if ($general->identity == "student")
        foreach ($list->types as $t)
          if ($t->unit && $t->unit->name == $general->info->student->unit->name)
            $output = $t->type->name;
      if ($output == "")
        foreach ($list->types as $t)
          if ($t->unit && $t->unit->name == "其餘")
            $output = $t->type->name;
      echo $output;
      @endphp
    @else
      @foreach ($list->types as $t)
        @if ($t->unit && $t->type)
        <div>{{$t->unit->name}}:{{$t->type->name}}</div>
        @endif
      @endforeach
    @endif
  </span>

  <span class="col-1">
    @foreach ($list->times->sortBy('period') as $t)
      <div>{{$t->day->simple_name}}:{{$t->period->id}}</div>
    @endforeach
  </span>

  <span class="col-1 hidden-sm-down">
    {{$list->course_base->credit}}
  </span>

  <span class="col-1 hidden-sm-down">
  @if ($list->classroom)
    {{$list->classroom->name}}
  @endif
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
    <div>課程代號: {{$list->id}}</div>
    <div>授課語言 : {{$list->language}}</div>
  @if ($list->unit)
    <div>開課單位 : {{$list->unit->name}}</div>
  @endif
    <div>開課學年-學期 : {{$list->year}}-{{$list->semester}}</div>
    <div>尚可登記人數/總人數 : {{$list->enrollment_remain}}/{{$list->enrollment_max}}</div>
    <div class="hidden-md-up">學分 : {{$list->credit}}</div>
  @if ($list->classroom)
    <div class="hidden-md-up">教室 : {{$list->classroom->name}}</div>
  @endif
    <a href="javascript:void(0)">課程大綱</a>
  </div>
</div>

</li>
