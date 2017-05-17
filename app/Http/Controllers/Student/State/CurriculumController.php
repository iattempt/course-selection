<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Student\StateController;

class CurriculumController extends StateController
{
    function __construct () {
        parent::__construct();
        $this->general->title = "Curricula";
        $this->general->view_path .= "/curriculum";
    }
    
    function index(Request $request) {
        $this->general->days = $this->day->all();
        $this->general->periods = $this->period->all();
        $this->general->curricula = $this->curriculum->own(Auth::user()->id);

        return view('student/state/curriculum', ['general' => $this->general]);
    }
}
