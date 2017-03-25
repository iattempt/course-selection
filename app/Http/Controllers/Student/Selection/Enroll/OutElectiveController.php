<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\Selection\EnrollController;

class OutElectiveController extends EnrollController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Enroll out-elective";
    }
    function index() {
        return view('student/selection/enroll/out_elective', $this->data);
    }
}
