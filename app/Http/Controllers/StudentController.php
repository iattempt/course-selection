<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\CourseSelection\Models\User;
use App\CourseSelection\Models\Student;

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

        return view('student/index', ['general' => $this->general]);
    }
}
