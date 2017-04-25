        @if ($loop->index%2 != 0)
        <li class="list-group-item row">
        @else
        <li class="list-group-item row bg-faded">
        @endif
          <span class="col-4">
            <a data-toggle="collapse" href="#expand{{$list->id}}" aria-expanded="false">
            {{$list->name}}
            </a>
            <!--欲增加取消功能-->
            @if ($general->info->type == "student")
                <form action="course_search" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" value="{{$general->info->id}}" name="student_id">
                  <input type="hidden" value="{{$list->id}}" name="course_id">
                  <input type="submit" value="加選" class="btn btn-success">
                </form>
                <form action="course_search/{{$list->id}}" method="POST">
                  <input name="_method" type="hidden" value="DELETE">
                  {{ csrf_field() }}
                  <input type="submit" value="取消加選" class="btn btn-danger">
                </form>
            @endif
          </span>

          <span class="col-3">
          @foreach ($list->professors as $p)
            {{$p->user->name}}&nbsp;
          @endforeach
          </span>

          <span class="col-1">
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
            <div>課程代號: {{$list->id}}</div>
            <div>授課語言 : {{$list->language}}</div>
            <div>MOOC : {{$list->mooc==1 ? "是"  :  "否"}}</div>
            <div>開課單位 : {{$list->unit->name}}</div>
            <div>開課學年-學期 : {{$list->year}}-{{$list->semester}}</div>
            <div>課程剩餘人數 : {{$list->enrollment_remain}}/{{$list->enrollment_max}}</div>
            <div class="hidden-md-up">學分 : {{$list->credit}}</div>
            <div class="hidden-md-up">教室 : {{$list->classroom->name}}</div>
          </div>
        </div>

        </li>
