<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfessorController;

class UnitCourseController extends ProfessorController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Unit course";
    }
    function index() {
        return view('professor/unit_course', $this->data);
    }
}
