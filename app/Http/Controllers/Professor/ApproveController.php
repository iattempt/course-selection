<?php

namespace App\Http\Controllers\Professor;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfessorController;

class ApproveController extends ProfessorController
{
    //
    function __construct () {
        parent::__construct();
        $this->general->title = "Approve";
        $this->general->view_path .= "/approve";
    }
    function index(Request $request) {
        return view('professor/approve', ['general' => $this->general]);
    }
}
