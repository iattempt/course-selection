<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseSearchController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = 'student';
    }
    function index() {
        return view('course_search', ['general' => $this->general]);
    }
}
