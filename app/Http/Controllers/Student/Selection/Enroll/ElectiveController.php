<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Common\CourseSearchController;

class ElectiveController  extends CourseSearchController
{
    public function __construct () {
        parent::__construct();
        $this->general->title = "Enroll in-required";
        $this->general->view_path .= "/elective";
    }

    public function index(Request $request) {
        $request->input('type')[0] = "選修";
        dd($request);
    }
}
