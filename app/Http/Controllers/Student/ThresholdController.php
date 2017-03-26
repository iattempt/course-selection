<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class ThresholdController extends StudentController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Threshold";
    }
    function index() {
        return view('student/state/threshold', ['general' => $this->general]);
    }
}
