<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Student\StateController;

class ThresholdController extends StateController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Threshold";
    }
    function index(Request $request) {
        return view('student/state/threshold', ['general' => $this->general]);
    }
}
