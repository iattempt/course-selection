<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\CourseSelection\Models\Professor;

class ProfessorController extends Controller
{
    public function __construct () {
        parent::__construct();
        $this->general->identity = "professor";
        $this->general->title = "professor";
        $this->general->view_path .= "/professor";
    }

    public function index(Request $request) {
        $this->general->info = User::find(Auth::user()->id);

        return view('professor/index', ['general' => $this->general]);
    }
}
