<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\SelectionController;

class DropController extends SelectionController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Drop";
    }
    function index() {
        return view('student/selection/drop', ['general' => $this->general]);
    }
}
