<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Selection\Course;

class CourseSearchController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = 'course search';
        //temporary
        //$this->general->course->lists = array('1', '2', '3', '4', '5', '6');
        $this->general->lists = Course::all();
    }
    function index($id) {
        $this->general->identity = $id;
        return view('course_search', ['general' => $this->general]);
    }
}
