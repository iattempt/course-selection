<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

class SelectionController extends StudentController
{
    //
    public function __construct() {
        parent::__construct();
        $this->general->view_path .= "/selection";
    }
    function index(Request $request) {
    
    }
}
