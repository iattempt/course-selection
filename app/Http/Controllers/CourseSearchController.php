<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check() && $id == Auth::user()->getType()) {
            $this->general->identity = Auth::user()->getType();
            return view('course_search', ['general' => $this->general]);
        }
        return redirect('/');
    }
}
