<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\CourseSearchController;

class ElectiveController  extends CourseSearchController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Enroll in-required";
    }
    function index() {
        parent::index();
        $this->general->lists = DB::table('courses')->where('unit_name', (DB::table('students')->where('id', Auth::user()->id)->get()[0]->unit_name))->get();
        return view('course_search', ['general' => $this->general]);
    }
}
