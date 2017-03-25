<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfessorController;

class MyCourseController extends ProfessorController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "My course";
    }
    function index() {
        return view('professor/my_course', $this->data);
    }
}
