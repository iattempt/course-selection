<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseSearchController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = 'course search';
    }
    function index() {
        if (Auth::check()) {
            $this->general->identity = Auth::user()->getType();
            $this->general->lists = DB::table('courses')->get();
            $this->general->filters = array('professor', 'course');
            return view('course_search', ['general' => $this->general]);
        }
        return redirect('sign_in');
    }
}

class Filter
{
    // search elements
    // unique
    public $professor = "";
    public $course = "";

    // multiple
    public $state;   //enroll, drop or none(identity is not student)
    public $time;
    public $type;
    public $unit;
    public $credit;
    public $can_enroll = 1;
    public $language;
    public $mooc;
    public $year;
    public $semester;
    public function __construct()
    {
        //$year = date('Y');
        //$semester = (date('m')<2 && date('m')>8) ? '1' : '2';
    }
}
