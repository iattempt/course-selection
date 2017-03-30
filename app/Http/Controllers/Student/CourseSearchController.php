<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class CourseSearchController extends StudentController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = 'student';
    }
    function index() {
        return view('course_search', ['general' => $this->general]);
    }
}
