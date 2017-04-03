<li class="list-group-item row">
  @if ($general->identity === "student")
  <span class="col-1">
    <label class="custom-condivol custom-checkbox">
      <input type="checkbox" class="custom-condivol-input">
      <span class="custom-condivol-indicator"></span>
      <span class="custom-condivol-description"></span>
    </label>
  </span>
  <span class="col-6">
  @else
  <span class="col-7">
  @endif
    <a class="" data-toggle="collapse" href="#collapseExample{{$list->name}}" aria-expanded="false">展開</a>
    {{$list->name}}
  </span>
  <span class="col-2">{{$list->professor}}</span>
  <span class="col-1">{{$list->type}}</span>
  <span class="col-1">{{$list->day}}</span>
  <span class="col-1">{{$list->period}}</span>
</li>
<div class="row">
  <div class="collapse" id="collapseExample{{$list->name}}">
    <div class="card card-block">
      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
    </div>
  </div>
</div>
