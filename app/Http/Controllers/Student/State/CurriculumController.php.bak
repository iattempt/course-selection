<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Student\StateController;

class CurriculumController extends StateController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Curricula";
    }
    function index() {
        //->join('course_time', 'course_id', '=', 'course.id')
        $this->general->days = DB::table('days')->orderby('id', 'asc')->get();
        $this->general->periods = DB::table('periods')->orderby('id', 'asc')->get();
        
        $this->general->lists = DB::table('curricula')->join('courses', 'course_id', '=', 'courses.id');

        $this->general->lists = $this->general->lists->join('course_time', 'course_time.course_id', '=', 'courses.id');
        
        $this->general->lists = $this->general->lists->join('course_professors', 'course_professors.course_id', '=', 'courses.id');

        //current student
        $this->general->lists = $this->general->lists->where('student_id', Auth::user()->id)->get();

        $this->general->state = "預選";

        return view('student/state/curriculum', ['general' => $this->general]);
    }
}
