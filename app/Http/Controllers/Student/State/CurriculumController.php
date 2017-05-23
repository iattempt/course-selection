<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Student\StateController;

class CurriculumController extends StateController
{
    function __construct () {
        parent::__construct();
        $this->general->title = "curriculum";
        $this->general->view_path .= "/curriculum";
    }
    
    function index(Request $request) {
        $this->general->days = $this->day->instance()->get();
        $this->general->periods = $this->period->instance()->get();
        $this->general->pre_curriculum = $this->curriculum->instance()->suitOwn(Auth::user()->id);
        $this->general->pre_curriculum = $this->general->pre_curriculum->suitPre()->get();

        $this->general->cur_curriculum = $this->curriculum->instance()->suitOwn(Auth::user()->id);
        $this->general->cur_curriculum = $this->general->cur_curriculum->suitCur()->get();

        return view('student/state/curriculum', ['general' => $this->general]);
    }
}
