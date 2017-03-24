<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseSearchController extends Controller
{
    //
    function index() {
        $data['title'] = 'Course search';
        $data['G_SCHOOL'] = "東海";
        $data['G_SCHOOL_WEBSITE'] = "http://www.thu.edu.tw";
        $data['auth'] = "student";

        return view('course_search', $data);
    }
    function enroll() {
    
    }
}
