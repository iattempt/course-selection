<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfessorController;

class MyCourseController extends ProfessorController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "My course";
        $this->general->view_path .= "/my_course";
    }
    function index(Request $request) {
        return view('professor/my_course', ['general' => $this->general]);
    }
}
