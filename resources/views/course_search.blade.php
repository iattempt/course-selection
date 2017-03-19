@extends('schema/preset')
@section('nav')
@endsection
@section('main')
<div class="container">
  <form action="/sign_out" method="post">
    {{ csrf_field() }}
    <div class="row">
      <a class="btn btn-warning col-12" data-toggle="collapse"  data-parent=""href="#filter" aria-controls="filter">
        篩選器
      </a>
    </div>
    <div class="row">
      <div id="filter" class="collapse col-12 show" role="tabpanel" aria-labelledby="headingFilter">
        <!--Level 2-->
        <div id="filterOptions" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne">
              <div class="btn-group d-flex justify-content-center" role="group">
                <button type="button" class="btn btn-secondary" data-toggle="collapse" data-parent="#filterOptions" href="#collapseCredit" aria-expanded="true" aria-controls="collapseOne">
                  學分
                </button>
                <button type="button" class="btn btn-secondary" data-toggle="collapse" data-parent="#filterOptions" href="#collapseDay" aria-expanded="true" aria-controls="collapseOne">
                  星期
                </button>
                <button type="button" class="btn btn-secondary" data-toggle="collapse" data-parent="#filterOptions" href="#collapseLanguage" aria-expanded="true" aria-controls="collapseOne">
                  語言
                </button>
                <button type="button" class="btn btn-secondary" data-toggle="collapse" data-parent="#filterOptions" href="#collapseMOOCs" aria-expanded="true" aria-controls="collapseOne">
                  MOOCs
                </button>
                <button type="button" class="btn btn-secondary" data-toggle="collapse" data-parent="#filterOptions" href="#collapsePeriod" aria-expanded="true" aria-controls="collapseOne">
                  時段
                </button>
                <button type="button" class="btn btn-secondary" data-toggle="collapse" data-parent="#filterOptions" href="#collapseType" aria-expanded="true" aria-controls="collapseOne">
                  修別
                </button>
                <button type="button" class="btn btn-secondary" data-toggle="collapse" data-parent="#filterOptions" href="#collapseUnit" aria-expanded="true" aria-controls="collapseOne">
                  開課單位
                </button>
                <input type="submit" class="btn btn-danger" value="刷新">
              </div>
            </div>

            <div id="collapseCredit" class="collapse" role="tabpanel" aria-labelledby="headingCredit">
              <div class="card-block">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    2
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    3
                  </label>
                </div>
              </div>
            </div>
            <div id="collapseDay" class="collapse" role="tabpanel" aria-labelledby="headingDay">
              <div class="card-block">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    星期一
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    星期二
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    星期三
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    星期四
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    星期五
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    星期六
                  </label>
                  <label class="form-check-label sr-only">
                    <input type="checkbox" class="form-check-input">
                    星期日
                  </label>
                </div>
              </div>
            </div>
            <div id="collapseLanguage" class="collapse" role="tabpanel" aria-labelledby="headingLanguage">
              <div class="card-block">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    中文
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    英文
                  </label>
                </div>
              </div>
            </div>
            <div id="collapseMOOCs" class="collapse" role="tabpanel" aria-labelledby="headingMOOCs">
              <div class="card-block">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    是
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    否
                  </label>
                </div>
              </div>
            </div>
            <div id="collapsePeriod" class="collapse" role="tabpanel" aria-labelledby="headingPeriod">
              <div class="card-block">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第一節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第二節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第三節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第四節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第五節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第六節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第七節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第八節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第九節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第十節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第十一節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第十二節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    第十三節
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    包含
                  </label>
                </div>
              </div>
            </div>
            <div id="collapseType" class="collapse" role="tabpanel" aria-labelledby="headingType">
              <div class="card-block">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    基礎必修
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    系必修
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    必選修
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    本系選修
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    外系選修
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    通識自然
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    通識社會
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    通識人文
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    通識文明與經典
                  </label>
                </div>
              </div>
            </div>
            <div id="collapseUnit" class="collapse" role="tabpanel" aria-labelledby="headingUnit">
              <div class="card-block">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    資工系
                  </label>
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    資工系軟工組
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Level 2 end-->
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-12">
      <ul class="list-group">
        <li class="list-group-item row">
          <span class="col-1">加選</span>
          <span class="col-6">課程名稱</span>
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
</div>
@endsection
