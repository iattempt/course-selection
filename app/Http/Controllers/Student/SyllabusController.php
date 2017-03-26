<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class SyllabusController extends StudentController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Syllabus";
    }
    function index() {
        return view('student/state/syllabus', ['general' => $this->general]);
    }
}
