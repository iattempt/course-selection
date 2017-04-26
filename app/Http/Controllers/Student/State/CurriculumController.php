<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Selection\Day;
use App\Selection\Period;
use App\Selection\Curriculum;

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
        $this->general->days = Day::orderby('id', 'asc')->get();
        $this->general->periods = Period::orderby('id', 'asc')->get();
        $this->general->curricula = Curriculum::where('student_id', Auth::user()->id)->get();

        return view('student/state/curriculum', ['general' => $this->general]);
    }
}
