<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfessorController;

class UnitCourseController extends ProfessorController
{
    public function __construct () {
        parent::__construct();
        $this->general->title = "Unit course";
        $this->general->view_path .= "/unit_course";
    }

    public function index(Request $request) {
        return view('professor/unit_course', ['general' => $this->general]);
    }
}
