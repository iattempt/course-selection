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
    }
    function index(Request $request) {
        return view('professor/approve', ['general' => $this->general]);
    }
}
