<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Selection\User;

class StudentController extends Controller
{
    //
    function __construct () {
        parent::__construct();
        $this->general->identity = "student";
        $this->general->title = "student";
        $this->general->view_path .= "/student";
    }
    function index(Request $request) {
        $this->general->info = User::find(Auth::user()->id);
        return view('student', ['general' => $this->general]);
    }
}
