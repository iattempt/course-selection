@extends('pre-selection')
@section('main')
<form action="/sign_out" method="post">
  {{ csrf_field() }}
  <!-- Filter -->
  <div class="row">
    <a class="btn btn-danger col-12" data-toggle="collapse"  data-parent=""href="#filter" aria-expanded="false" aria-controls="filter">
      篩選器
    </a>
    <div id="filter" class="collapse">
      <div class="card">
        <div id="filter_options" role="tablist" aria-multiselectable="true">
                <a class="btn btn-secondary" data-toggle="collapse" data-parent="#filter_ptions" href="#collapseDay" aria-expanded="true" aria-controls="collapseOne">
                  星期
                </a>
                <a class="btn btn-secondary" data-toggle="collapse" data-parent="#filter_options" href="#collapseDay2" aria-expanded="true" aria-controls="collapseOne2">
                  星期
                </a>
                <a class="btn btn-secondary" data-toggle="collapse" data-parent="#filter_options" href="#collapseDay3" aria-expanded="true" aria-controls="collapseOne3">
                  星期
                </a>
                <div id="collapseDay" class="collapse" role="tabpanel" aria-labelledby="headingDay">
                  <div class="card-block">
                    <div class="btn-group-vertical" data-toggle="buttons">
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期一
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期二
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期三
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期四
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期五
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期六
                      </label>
                      <label class="btn btn-secondary sr-only">
                        <input type="checkbox" class="form-check-input">
                        星期日
                      </label>
                    </div>
                  </div>
                </div>
                <div id="collapseDay2" class="collapse" role="tabpanel" aria-labelledby="headingDay2">
                  <div class="card-block">
                    <div class="btn-group-vertical" data-toggle="buttons">
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期一
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期二
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期三
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期四
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期五
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期六
                      </label>
                      <label class="btn btn-secondary sr-only">
                        <input type="checkbox" class="form-check-input">
                        星期日
                      </label>
                    </div>
                  </div>
                </div>
                <div id="collapseDay3" class="collapse" role="tabpanel" aria-labelledby="headingDay3">
                  <div class="card-block">
                    <div class="btn-group-vertical" data-toggle="buttons">
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期一
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期二
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期三
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期四
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期五
                      </label>
                      <label class="btn btn-secondary">
                        <input type="checkbox" class="form-check-input">
                        星期六
                      </label>
                      <label class="btn btn-secondary sr-only">
                        <input type="checkbox" class="form-check-input">
                        星期日
                      </label>
                    </div>
                  </div>
                </div>
        </div>
        <!-- end of Filter options  -->
      </div>
      <r class="my-4">
    </div>
  </div>
  <!-- end of Filter form  -->
</form>
<!-- Display result -->
<div class="row">
  <div class="col-12">
    <ul class="list-group">
      <li class="list-group-item row">
        @if ($auth === "student")
          <span class="col-1">加選</span>
          <span class="col-6">課程名稱</span>
        @else
        <span class="col-7">課程名稱</span>
        @endif
        <span class="col-2">授課教師</span>
        <span class="col-1">修別</span>
        <span class="col-1">星期</span>
        <span class="col-1">時段</span>
      </li>
      <li class="list-group-item row">
        <span class="col-1">
          <label class="custom-condivol custom-checkbox">
            <input type="checkbox" class="custom-condivol-input">
            <span class="custom-condivol-indicator"></span>
            <span class="custom-condivol-description"></span>
          </label>
        </span>
        <span class="col-6">
          <a class="" data-toggle="collapse" href="#collapseExample5" aria-expanded="false">詳</a>
          課程名稱
        </span>
        <span class="col-2">授課教師</span>
        <span class="col-1">修別</span>
        <span class="col-1">星期</span>
        <span class="col-1">時段</span>
      </li>
      <div class="row">
        <div class="collapse" id="collapseExample5">
          <div class="card card-block">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
      </div>
      <li class="list-group-item row">
        <span class="col-1">
          <label class="custom-condivol custom-checkbox">
            <input type="checkbox" class="custom-condivol-input">
            <span class="custom-condivol-indicator"></span>
            <span class="custom-condivol-description"></span>
          </label>
        </span>
        <span class="col-6">
          <a data-toggle="collapse" href="#collapseExample6" aria-expanded="false">詳</a>
          課程名稱
        </span>
        <span class="col-2">授課教師</span>
        <span class="col-1">修別</span>
        <span class="col-1">星期</span>
        <span class="col-1">時段</span>
      </li>
      <div class="row">
        <div class="collapse" id="collapseExample6">
          <div class="card card-block">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
      </div>
    </ul>
  </div>
</div>
<!-- end of Display result-->
@endsection
