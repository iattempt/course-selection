<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\StateController;

class PreSyllabusController extends StateController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Pre-syllabus";
    }
    function index() {
        return view('student/state/pre_syllabus', $this->data);
    }
}
