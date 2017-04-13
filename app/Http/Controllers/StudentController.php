<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->identity = "student";
        $this->general->title = "student";
    }
    function index(Request $request) {
        return view('student', ['general' => $this->general]);
    }
}
