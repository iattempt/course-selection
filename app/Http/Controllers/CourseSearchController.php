<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseSearchController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = 'Course search';
        // temporary
        $this->data['auth'] = "student";
    }
    function index() {

        return view('course_search', $this->data);
    }
}
