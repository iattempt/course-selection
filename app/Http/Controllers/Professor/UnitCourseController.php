<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfessorController;

class UnitCourseController extends ProfessorController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Unit course";
    }
    function index(Request $request) {
        return view('professor/unit_course', ['general' => $this->general]);
    }
}
