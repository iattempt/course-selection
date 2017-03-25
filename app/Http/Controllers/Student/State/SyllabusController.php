<?php

namespace App\Http\Controllers\Student\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\StateController;

class SyllabusController extends StateController
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = "Syllabus";
    }
    function index() {
        return view('student/state/syllabus', $this->data);
    }
}
