<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Student";
    }
    function index() {
        return view('student', ['general' => $this->general]);
    }
}
