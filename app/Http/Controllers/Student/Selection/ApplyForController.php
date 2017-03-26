<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\SelectionController;

class ApplyForController extends SelectionController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Apply for";
    }
    function index() {
        return view('student/selection/apply_for', ['general' => $this->general]);
    }
}
