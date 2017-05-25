<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Model\Unit;

use App\Http\Controllers\Student\StateController;

class ThresholdController extends StateController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Threshold";
        $this->general->view_path .= "/threshold";
    }
    function index(Request $request) {
        $this->threshold1 = $this->threshold1->instance()->suitUnit(Auth::user()->student->unit_id);
        $this->general->units = $this->unit->instance()->get();
        $this->general->types = $this->type->instance()->get();
        $this->general->course_bases = $this->course_base->instance()->get();
        $this->general->curriculum = $this->curriculum->instance()->suitOwn(Auth::user()->id)->get();

        $this->general->threshold_force = $this->threshold1->getOwnForceThreshold(Auth::user()->id);

        return view('student/state/threshold', ['general' => $this->general]);
    }
}
