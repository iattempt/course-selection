<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\Selection\EnrollController;

class ElectiveController extends EnrollController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Enroll elective";
    }
    function index() {
        return view('student/selection/enroll/out_elective', ['general' => $this->general]);
    }
}
