<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class PreSyllabusController extends StudentController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Pre-syllabus";
    }
    function index() {
        return view('student/state/pre_syllabus', ['general' => $this->general]);
    }
}
