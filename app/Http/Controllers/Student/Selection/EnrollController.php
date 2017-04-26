<?php

namespace App\Http\Controllers\Student\Selection;

use Illuminate\Http\Request;
use App\Http\Controllers\Student\SelectionController;

class EnrollController extends SelectionController
{
    //
    public function __construct () {
        parent::__construct();
        $this->general->view_path .= "/enroll";
    }
    function index(Request $request) {
    
    }
}
