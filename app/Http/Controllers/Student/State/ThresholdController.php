<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Repository\ThresholdRepository as Threshold;
use App\Http\Controllers\Student\StateController;

class ThresholdController extends StateController
{
    public function __construct () {
        parent::__construct();
        $this->general->title = "Threshold";
        $this->general->view_path .= "/threshold";
    }

    public function index(Request $request) {
        $threshold = (new Threshold(Auth::id()))->suitAll();
        $this->general->threshold = $threshold->copy()->getList();

        $this->general->credit = $threshold->copy()->getCredit();

        $this->general->remain_list = $threshold->copy()->getForceList();

        return view('student/state/threshold', ['general' => $this->general]);
    }
}
