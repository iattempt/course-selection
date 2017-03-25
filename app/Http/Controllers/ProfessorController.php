<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->data['title'] = 'Professor';
        $this->data['auth'] = "professor";
    }
    function index() {
        return view('professor', $this->data);
    }
}
