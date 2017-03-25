<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\Selection\EnrollController;

class InElectiveController extends EnrollController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Enroll in-elective";
    }
    function index() {
        return view('student/selection/enroll/in_elective', $this->data);
    }
}
