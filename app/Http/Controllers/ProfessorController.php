<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->identity = "professor";
        $this->general->title = "professor";
    }
    function index() {
        return view('professor', ['general' => $this->general]);
    }
}
