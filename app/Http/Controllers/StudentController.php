<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Student";
        $this->data['auth'] = "student";
    }
    function index() {
        return view('student', $this->data);
    }
}
