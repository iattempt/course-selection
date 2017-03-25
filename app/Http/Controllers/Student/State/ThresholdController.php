<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\StateController;

class ThresholdController extends StateController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Threshold";
    }
    function index() {
        return view('student/state/threshold', $this->data);
    }
}
