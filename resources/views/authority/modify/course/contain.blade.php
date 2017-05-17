<td>
  {{ $list->id }}
</td>

<td>
  <input type="text" class="edit_{{ $list->id }} form-control" name="name" value="{{ $list->name }}" readonly>
</td>

<td>
  <select class="edit_{{ $list->id }} form-control" name="course_base_id" disabled>
    @foreach ($general->course_bases as $value)
      @if ($value->id == $list->course_base_id)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>

<td><!--教授-->
  <select multiple class="edit_{{ $list->id }} form-control" name="professors" disabled>
    @php
      foreach ($general->professors as $pro) {
        $isIt = false;
        foreach ($list->professors as $own_pro) {
          if ($own_pro->user->id == $pro->id)
            $isIt = true;
        }
        if ($isIt)
          echo '<option value="'.$pro->id.'" selected>'.$pro->name.'</option>';
        else
          echo '<option value="'.$pro->id.'">'.$pro->name.'</option>';
      }
    @endphp
  </select>
</td>

<td><!--單位-->
  <select class="edit_{{ $list->id }} form-control" name="unit_id" disabled>
    @foreach ($general->units as $value)
      @if ($value->id == $list->unit_id)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>

<td><!--教室-->
  <select class="edit_{{ $list->id }} form-control" name="classroom_id" disabled>
    @foreach ($general->classrooms as $value)
      @if ($value->id == $list->classroom_id)
        <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
      @else
        <option value="{{ $value->id }}">{{ $value->name }}</option>
      @endif
    @endforeach
  </select>
</td>
<!--需要修改格式，或者接收資料要分割字串-->
<td><!--時段-->
  <select multiple class="edit_{{ $list->id }} form-control" name="professors" disabled>
    @php
      foreach ($general->days as $d) {
        foreach ($general->periods as $p) {
          $isCurrent = false;
          foreach ($list->time as $ct) {
            if (($ct) && ($ct->day_id === $d->id) && ($ct->period_id === $p->id))
              $isCurrent = true;
          }
          if ($isCurrent)
            echo '<option value="'.$d->id.$p->id.'" selected>'.$d->name.$p->name.'</option>';
          else
            echo '<option value="'.$d->id.$p->id.'">'.$d->name.$p->name.'</option>';
        }
      }
    @endphp
  </select>
</td>
<!--暫時有個樣子，要對應科系之修別-->
<td><!--修別-->
  <select multiple class="edit_{{ $list->id }} form-control" name="professors" disabled>
    @php
      foreach ($general->types as $value) {
        echo '<option value="'.$value->id.'">'.$value->name.'</option>';
      }
    @endphp
  </select>
</td>

<td>
  <input type="text" class="edit_{{ $list->id }} form-control" name="topic" value="{{ $list->topic }}" readonly>
</td>

<td>
  <select class="edit_{{ $list->id }} form-control" name="credit" disabled>
    <option value="0" {{ ($list->credit == '0' ? 'selected' : '') }}>0</option>
    <option value="1" {{ ($list->credit == '1' ? 'selected' : '') }}>1</option>
    <option value="2" {{ ($list->credit == '2' ? 'selected' : '') }}>2</option>
    <option value="3" {{ ($list->credit == '3' ? 'selected' : '') }}>3</option>
  </select>
</td>

<td>
  <select class="edit_{{ $list->id }} form-control" name="language" disabled>
    <option value="英文" {{ ($list->language == '英文' ? 'selected' : '') }}>英文</option>
    <option value="中文" {{ ($list->language == '中文' ? 'selected' : '') }}>中文</option>
  </select>
</td>

<td>
  <select class="edit_{{ $list->id }} form-control" name="year" disabled>
    <option value="2017" {{ ($list->year == '2017' ? 'selected' : '') }}>2017</option>
    <option value="2016" {{ ($list->year == '2016' ? 'selected' : '') }}>2016</option>
  </select>
</td>

<td>
  <select class="edit_{{ $list->id }} form-control" name="semester" disabled>
    <option value="1" {{ ($list->semester == '1' ? 'selected' : '') }}>1</option>
    <option value="2" {{ ($list->semester == '2' ? 'selected' : '') }}>2</option>
  </select>
</td>

<td>
  <select class="edit_{{ $list->id }} form-control" name="enrollment_max" disabled>
    @for ($i=0; $i<100; $i++)
      <option value="{{ $i }}" {{ ($list->enrollment_max == $i ? 'selected' : '') }}>{{ $i }}</option>
    @endfor
  </select>
</td>
