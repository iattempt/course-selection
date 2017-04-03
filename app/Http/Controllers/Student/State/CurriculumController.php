<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\StateController;
use App\Selection\Curriculum;

class CurriculumController extends StateController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Curriculum";
    }
    function index() {
        $this->general->lists = Curriculum::all();
        return view('student/state/curriculum', ['general' => $this->general]);
    }
}
