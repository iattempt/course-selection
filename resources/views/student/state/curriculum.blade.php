@extends('student/state')
@section('state')

<div class="container">
  <div class="row hidden-md-up">
  <table class="table table-bordered table-striped">
    <!-- table head -->
    <thead class="thead-inverse">
      <tr id="curriculum_th">
        <th>
          <div class="d-flex justify-content-center">
            時段\星期
          </div>
        </th>
        <th><a onclick="change_day(this)" class="d-flex justify-content-center {{$general->day != '1' ? :' text-white' }}" id="星期一" href="javascript:void(0)">一</a></th>
        <th><a onclick="change_day(this)" class="d-flex justify-content-center {{$general->day != '2' ? :' text-white' }}" id="星期二" href="javascript:void(0)">二</a></th>
        <th><a onclick="change_day(this)" class="d-flex justify-content-center {{$general->day != '3' ? :' text-white' }}" id="星期三" href="javascript:void(0)">三</a></th>
        <th><a onclick="change_day(this)" class="d-flex justify-content-center {{$general->day != '4' ? :' text-white' }}" id="星期四" href="javascript:void(0)">四</a></th>
        <th><a onclick="change_day(this)" class="d-flex justify-content-center {{$general->day != '5' ? :' text-white' }}" id="星期五" href="javascript:void(0)">五</a></th>
        <th><a onclick="change_day(this)" class="d-flex justify-content-center {{$general->day != '6' ? :' text-white' }}" id="星期六" href="javascript:void(0)">六</a></th>
      </tr>
    </thead>
    <!-- table head -->
    <!-- table body -->
    <tbody id="curriculum_tb">
      <!-- table row -->
      @if (isset($general->periods))
      @foreach ($general->periods as $period)
      <tr>
        <th scope="row">
          <div class="d-flex justify-content-center">
            {{$period->name}}
          </div>
        </th>
        <td colspan="6">
          @if (isset($general->lists))
          @foreach ($general->lists as $list)
            <!--  -->
            @if ($list->day_name == $general->day)
              @if ($list->state == $general->state && $list->period_name == $period->name)
                <div class="d-flex justify-content-center"><a href="#">{{$list->name}}</a></div>
              @endif
            @endif
          @endforeach
          @endif
        </td>
      </tr>
      <!-- table row -->
      @endforeach
      @endif
    </tbody>
    <!-- table body -->
  </table>
  </div>

  <!---->

  <div class="row hidden-sm-down">
  <table class="table table-bordered table-striped">
    <!-- table head -->
    <thead class="thead-inverse">
      <tr>
        <th>
          <div class="d-flex justify-content-center">
            時段\星期
          </div>
        </th>
        @if (isset($general->days))
        @foreach ($general->days as $day)
        <th>
          <div class="d-flex justify-content-center">
            {{$day->name}}
          </div>
        </th>
        @endforeach
        @endif
      </tr>
    </thead>
    <!-- table head -->
    <!-- table body -->
    <tbody>
      <!-- table row -->
      @if (isset($general->periods))
      @foreach ($general->periods as $period)
      <tr>
        <th scope="row">
          <div class="d-flex justify-content-center">
            {{$period->name}}
          </div>
        </th>
        @if (isset($general->days))
        @foreach ($general->days as $day)
          <td>
            @if (isset($general->lists))
            @foreach ($general->lists as $list)
              @if ($list->day_name == $day->name)
                @if ($list->state == $general->state && $list->period_name == $period->name)
                  <div class="d-flex justify-content-center"><a href="#">{{$list->name}}</a></div>
                @endif
              @endif
            @endforeach
            @endif
          </td>
        @endforeach
        @endif
      </tr>
      <!-- table row -->
      @endforeach
      @endif
    </tbody>
    <!-- table body -->
  </table>
  </div>
</div>

<script>
function change_day(t) {
  document.getElementById('curriculum_th').innerHTML = "\
    <th>\
      <div class='d-flex justify-content-center'>時段星期</div>\
    </th>\
    <th>\
      <a onclick='change_day(this)' class='d-flex justify-content-center' id='星期一' href='javascript:void(0)'>一\
      </a>\
    </th>\
    <th>\
      <a onclick='change_day(this)' class='d-flex justify-content-center'  id='星期二' href='javascript:void(0)'>二\
      </a>\
    </th>\
    <th>\
      <a onclick='change_day(this)' class='d-flex justify-content-center' id='星期三' href='javascript:void(0)'>三\
      </a>\
    </th>\
    <th>\
      <a onclick='change_day(this)' class='d-flex justify-content-center' id='星期四'href='javascript:void(0)'>四\
      </a>\
    </th>\
    <th>\
      <a onclick='change_day(this)' class='d-flex justify-content-center' id='星期五'href='javascript:void(0)'>五\
      </a>\
    </th>\
    <th>\
      <a onclick='change_day(this)' class='d-flex justify-content-center' id='星期六' href='javascript:void(0)'>六\
      </a>\
    </th>";
  document.getElementById(t.getAttribute("id")).className += ' text-white';

  var day="星期一";

  //var dd = "{{$general->lists[0]->day_name}}";
  //document.getElementById('test').innerHTML = dd == "星期一" ? "123" : "4";

  document.getElementById('curriculum_tb').innerHTML = "\
      @if (isset($general->periods))\
      @foreach ($general->periods as $period)\
      <tr>\
        <th scope='row'>\
          <div class='d-flex justify-content-center'>\
            {{$period->name}}\
          </div>\
        </th>\
        <td colspan='6'>\
          @if (isset($general->lists))\
          @foreach ($general->lists as $list)\
            @if ($list->day_name == '" + t.getAttribute("id") + "')\
              @if ($list->state == $general->state && $list->period_name == $period->name)\
                <div class='d-flex justify-content-center'><a href='#'>{{$list->name}}</a></div>\
              @endif\
            @endif\
          @endforeach\
          @endif\
        </td>\
      </tr>\
      @endforeach\
      @endif";
};
</script>

@endsection
