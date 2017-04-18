<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Selection\User;

class ProfessorController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->identity = "professor";
        $this->general->title = "professor";
    }
    function index(Request $request) {
        $this->general->info = User::find(Auth::user()->id);
        return view('professor', ['general' => $this->general]);
    }
}
