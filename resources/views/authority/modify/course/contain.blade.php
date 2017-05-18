<td><!--代號-->
  {{ $list->id }}
</td>

<td><!--名稱-->
  <input type="text" class="edit_{{ $list->id }} form-control" name="name" value="{{ $list->name }}" readonly>
</td>

<td><!--基底代號-->
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

<td><!--學分-->
  <select class="edit_{{ $list->id }} form-control" name="credit" disabled>
    <option value="0" {{ ($list->credit == '0' ? 'selected' : '') }}>0</option>
    <option value="1" {{ ($list->credit == '1' ? 'selected' : '') }}>1</option>
    <option value="2" {{ ($list->credit == '2' ? 'selected' : '') }}>2</option>
    <option value="3" {{ ($list->credit == '3' ? 'selected' : '') }}>3</option>
  </select>
</td>

<td><!--語言-->
  <select class="edit_{{ $list->id }} form-control" name="language" disabled>
    <option value="英文" {{ ($list->language == '英文' ? 'selected' : '') }}>英文</option>
    <option value="中文" {{ ($list->language == '中文' ? 'selected' : '') }}>中文</option>
  </select>
</td>

<td><!--學年度-->
  <select class="edit_{{ $list->id }} form-control" name="year" disabled>
    <option value="2017" {{ ($list->year == '2017' ? 'selected' : '') }}>2017</option>
    <option value="2016" {{ ($list->year == '2016' ? 'selected' : '') }}>2016</option>
  </select>
</td>

<td><!--學期-->
  <select class="edit_{{ $list->id }} form-control" name="semester" disabled>
    <option value="1" {{ ($list->semester == '1' ? 'selected' : '') }}>1</option>
    <option value="2" {{ ($list->semester == '2' ? 'selected' : '') }}>2</option>
  </select>
</td>

<td><!--限修人數-->
  <select class="edit_{{ $list->id }} form-control" name="enrollment_max" disabled>
    @for ($i=0; $i<100; $i++)
      <option value="{{ $i }}" {{ ($list->enrollment_max == $i ? 'selected' : '') }}>{{ $i }}</option>
    @endfor
  </select>
</td>
