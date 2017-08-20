<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class StateController extends StudentController{
    public function __construct()
    {
        parent::__construct();
        $this->general->view_path .= "/";
    }

    public function index(Request $request) {}
}
