<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CourseSelection\Models\Day;
use App\CourseSelection\Models\Period;
use App\CourseSelection\Models\Curriculum;

use App\Http\Controllers\Student\StateController;

class CurriculumController extends StateController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Curricula";
        $this->general->view_path .= "/curriculum";
    }
    function index(Request $request) {
        $this->general->days = Day::all()->sortBy('id');
        $this->general->periods = Period::all()->sortBy('id');
        $this->general->curricula = Curriculum::all()->where('student_id', Auth::user()->id);

        return view('student/state/curriculum', ['general' => $this->general]);
    }
}
