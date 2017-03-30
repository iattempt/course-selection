<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfessorController;

class CourseSearchController extends ProfessorController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = 'professor';
    }
    function index() {
        return view('course_search', ['general' => $this->general]);
    }
}
