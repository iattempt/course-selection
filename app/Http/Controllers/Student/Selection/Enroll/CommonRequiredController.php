<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\Selection\EnrollController;

class CommonRequiredController extends EnrollController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Enroll common required";
    }
    function index() {
        return view('student/selection/enroll/common_required', ['general' => $this->general]);
    }
}
