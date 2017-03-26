<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\Selection\EnrollController;

class GeneralController extends EnrollController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Enroll general";
    }
    function index() {
        return view('student/selection/enroll/general', ['general' => $this->general]);
    }
}
