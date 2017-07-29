<?php

namespace App\Http\Controllers\Student\Selection\Enroll;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Common\CourseSearchController;

class ApplyForController extends CourseSearchController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Apply For";
        $this->general->view_path .= "/apply_for";
    }
    function index(Request $request) {
        parent::index();
        $this->general->lists = DB::table('courses')->where('unit_name', (DB::table('students')->where('id', Auth::user()->id)->get()[0]->unit_name))->get();
        return view('course_search', ['general' => $this->general]);
    }
}
