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
    {{$p->user->name}}
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

</li>
<div class="collapse" id="expand{{$list->id}}">
  <div class="row">
    @if ($general->info->type == "student")
      <span class="col"><a href="#">加選</a></span>
    @endif
    <span class="col">學分{{$list->credit}}</span>
    <span class="col">教室{{$list->classroom->name}}</span>
  </div>
</div>
